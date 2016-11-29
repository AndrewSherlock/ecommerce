<?php
/**
 *  Comment
 */

namespace Itb;
use PDO;

/**
 * Class CheckoutFunctions
 * @package Itb
 */
class CheckoutFunctions
{

    /**
     * When we get a order for each of our product, it adds the number of items sold to our stats in the database
     * @param int $id
     * @param int $qty
     */
    function addOneToStats($id, $qty)
    {
        $connect = new Config();
        $searchSql = "SELECT product_sold FROM products_db WHERE id = :id";
        $query = $connect->connectPDO()->prepare($searchSql);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $productCount = $query->fetch();

        $qty = $qty + $productCount['product_sold'];
        $sql = "UPDATE products_db SET product_sold = :qty WHERE id = :id";
        $updateQuery = $connect->connectPDO()->prepare($sql);
        $updateQuery->bindParam(':qty', $qty, \PDO::PARAM_INT);
        $updateQuery->bindParam(':id', $id, \PDO::PARAM_INT);
        $updateQuery->execute();
    }

    /**
     * for use with stripe for the checkout system.
     * @param array $post
     * @param array $user
     * @return bool
     */
    function chargeCard($post, $user)
    {
        $validateF = new ValidateFunctions();
        $token  = $post['stripeToken'];
        $email = $validateF->sanitize($user['user_email']);
        $amount = ((int)$post['amount']);


        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'card'  => $token
        ));
        try {
        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $amount,
            'currency' => 'eur'
        ));
            return true;
        } catch (\Stripe\Error\ApiConnection $e) {
            $_SESSION['error'] = ['There appears to be a network problem.'];
            return false;
        } catch (\Stripe\Error\InvalidRequest $e) {
            $_SESSION['error'] = ['Oh no, Something has gone wrong. Please Try again.'];
            return false;
        } catch (\Stripe\Error\Api $e) {
            $_SESSION['error'] = ['Server error, please try again later.'];
            return false;
        } catch (\Stripe\Error\Card $e) {
            $_SESSION['error'] = ['Your card has been declined.'];
            return false;
        }

    }

    /**
     *  Checks that we have our product in stock and if we do returns true, else returns false
     * @param array $itemsTocheck
     * @param array $itemsDB
     * @return bool
     */
    function inStock($itemsTocheck, $itemsDB)
    {
        $text = new TextFunctions();
        for($i = 0; $i < count($itemsTocheck); $i++)
        {
            $sizes = $text->deconstructString($itemsDB[$i]['product_info']->getSize());
            if($itemsTocheck[$i][0] == $itemsDB[$i][0])
            {
                foreach($sizes as $size)
                {
                    if($size[0] == $itemsTocheck[$i][1])
                    {
                        if($size[1] < $itemsTocheck[$i][3])
                        {
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * Checks quantity for adding to cart
     * @param int $id
     * @param array $productArray
     * @return bool
     */
    function checkCartQty($id, $productArray)
    {
        $productRp = new ProductRepository();
        $text = new TextFunctions();
        $product = $productRp->getOneFromDb($id);
        $productObj = new Product();

        $productObj->copyToProduct(json_decode($product['product_info'], true));
        $product['product_info'] = $productObj;
        $dbSize = $text->deconstructString($productObj->getSize());
        foreach ($dbSize as $sizeCheck) {
            if ($sizeCheck[0] == $productArray[1]) {
                echo 'found';
                if ($sizeCheck[1] < $productArray[3]) {
                    return false;
                }
            }
        }
        return true;
    }

}