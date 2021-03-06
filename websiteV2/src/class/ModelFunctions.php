<?php
/**
 * Comment
 */
    namespace Itb;

    /**
     * Class ModelFunctions
     * @package Itb
     */
    class ModelFunctions
    {
        /**
         *  gets our user form
         */
        function getAddUserForm()
        {
            $mainC = new MainController();
            if ($_GET['action'] == 'edituser') {
                $userCD = new UserCrud();
                $validateF = new ValidateFunctions();
                $userSearch = $userCD->getUserFromDatabase($validateF->sanitize($_GET['id']));
                $userObj = new User();
                $userObj->userFromJson($userSearch['user_info']);
                $address = explode(',', $userObj->getAddress());
            }
            $styleArray = ['','','current','',''];
            $mainC->getHeader('Add User', $styleArray);
            require_once '../templates/adduser.php';
            $mainC->getFooter();
        }

        /**
         * gets the admin pane
         */
        function getAdminPane()
        {
            $mainC = new MainController();
            $orderCD = new OrderCrud();
            $orders = $orderCD->getOrderInfo(0, 8);
            $ordersData = $orderCD->getAllOrderData();
            $productRP = new ProductRepository();
            $text = new TextFunctions();
            $validateF = new ValidateFunctions();
            $products = $productRP->getAllProducts();
            $lowStock = $productRP->getLowStock($products);
            $styleArray = ['','','current','',''];
            $mainC->getHeader('Admin Pane', $styleArray);
            require_once '../templates/admin.php';
            $mainC->getFooter();
        }

        /**
         * gets the order list
         */
        function getAllOrders()
        {
            $mainC = new MainController();
            $validateF = new ValidateFunctions();
            $orderCD = new OrderCrud();
            $orders = $orderCD->getOrderInfo(0, 1000);
            $text = new TextFunctions();
            $styleArray = ['','','current','',''];
            $mainC->getHeader('Orders', $styleArray);
            require_once '../templates/orderlist.php';
            $mainC->getFooter();
        }

        /**
         * gets the admin products
         */
        function getAdminProducts()
        {
            $rp = new ProductRepository();
            $text = new TextFunctions();
            $mainC = new MainController();
            if (isset($_GET['discount']) && !empty($_POST)) {
                if ($_POST['discount_amount'] != '') {
                    $validateF = new ValidateFunctions();
                    $discount = $validateF->sanitize($_POST['discount_amount']);
                    if ($discount >= 0 && $discount <= 100) {
                        $productCD = new ProductCrud();
                        $productCD->updateProductDiscount($_POST['discount_amount'], $_GET['id']);
                        $_SESSION['success'] = ['Discount added to product.'];
                    }
                }
                header('Location:index.php?action=adminProducts');
            }
            $search = ((isset($_GET['list']) && $_GET['list'] = 'archived')) ? $rp->getProductsArchived(1) : $rp->getProductsArchived(0);
            for ($i = 0; $i < count($search); $i++) {
                $search[$i][2] = json_decode($search[$i][2], true);
            }
            $styleArray = ['','','current','',''];
            $mainC->getHeader('Admin Products', $styleArray);
            require_once '../templates/adminProducts.php';
            $mainC->getFooter();
        }

        /**
         *  gets the product info
         */
        function getProductInfoPane()
        {
            $connect = new Config();
            $mainC = new MainController();
            $text = new TextFunctions();
            $validateF = new ValidateFunctions();
            $productRp = new ProductRepository();
            if ($_GET['action'] == 'editproduct') {
                $rp = new ProductRepository();
                $product = $rp->getOneFromDb($validateF->sanitize($_GET['id']));
                if ($product != 0) {
                    $product['product_info'] = json_decode($product['product_info'], true);
                    $sizeArray = $text->deconstructString($product['product_info']['product_size']);
                    $cat = $connect->connectPDO()->query("SELECT * FROM category");
                    $categorys = $productRp->getCategorys();
                    $styleArray = ['','','current','',''];
                    $mainC->getHeader('Edit Product Information', $styleArray);
                    require_once '../templates/productInfo.php';
                    $mainC->getFooter();
                } else {
                    $_SESSION['error'] = ['No such product to edit.'];
                    header('Location:index.php?action=adminProducts');
                }
            } else if ($_GET['action'] == 'add') {
                $categorys = $productRp->getCategorys();
                $styleArray = ['','','current','',''];
                $mainC->getHeader('Add Product', $styleArray);
                require_once '../templates/productInfo.php';
                $mainC->getFooter();
            }
        }

        /**
         * gets the admin users
         */
        function getAdminUser()
        {
            $mainC = new MainController();
            $userCD = new UserCrud();
            $userList = $userCD->getUserArray();
            $styleArray = ['','','current','',''];
            $mainC->getHeader('User List', $styleArray);
            require_once '../templates/adminUsers.php';
            $mainC->getFooter();
        }

        /**
         *  check out action
         */
        function checkout()
        {
            $mainC = new MainController();
            $cartRp = new CartRepository();
            $text = new TextFunctions();
            $checkoutF = new CheckoutFunctions();

            if (isset($_GET['confirm'])) {
                $sql = "SELECT * FROM products_db WHERE id = :id";
                $cartProducts = $_SESSION['user_cart'];
                $productToCheck = $cartRp->getProducts($cartProducts);

                if (!$checkoutF->inStock($cartProducts, $productToCheck)) {
                    $_SESSION['error'] = ['Not enough stock'];
                    header('Location:index.php?action=checkout');
                    return;
                }
            }
            $styleArray = ['','','','current',''];
            $mainC->getHeader('Checkout', $styleArray);
            require_once '../templates/checkout.php';
            $mainC->getFooter();
        }

        /**
         * adds the order to the database
         * @param array $cart
         */
        function addOrderToOrderDB($cart)
        {
            $connect = new Config();
            $userRP = new UserRepository();
            $text = new TextFunctions();
            $validateF = new ValidateFunctions();

            $userInfo = $userRP->getOneFromDB($validateF->sanitize($_SESSION['id']));
            $user = new User();
            $user->copyToObject(json_decode($userInfo['user_info'], true));
            $userId = $validateF->sanitize($_SESSION['id']);
            $total = $text->centToEuro($_POST['amount']);
            $userAddress = $user->getName() . ', ' . $user->getAddress();
            $userPhone = $user->getPhone();
            $curDate = date('Y-m-d H:i:s');

            $sql = 'INSERT INTO orders_db(user_id, user_address, user_phone, user_total,user_items, date_ordered) 
                VALUES (:user_id, :user_address, :user_phone, :user_total,:user_items, :date_ordered)';
            $query = $connect->connectPDO()->prepare($sql);
            $query->bindParam(':user_id', $userId, \PDO::PARAM_INT);
            $query->bindParam(':user_address', $userAddress, \PDO::PARAM_STR);
            $query->bindParam(':user_phone', $userPhone, \PDO::PARAM_INT);
            $query->bindParam(':user_total', $total);
            $query->bindParam(':user_items', $cart, \PDO::PARAM_STR);
            $query->bindParam(':date_ordered', $curDate);
            $query->execute();

        }

        /**
         * gets the order history
         * @param int $id
         */
        function getOrderHistory($id)
        {
            $mainC = new MainController();
            $orderCD = new OrderCrud();
            $validateF = new ValidateFunctions();
            $orders = $orderCD->getDispatchedOrders($id);
            $text = new TextFunctions();
            $styleArray = ['','','current','',''];
            $mainC->getHeader('Order History', $styleArray);
            require_once '../templates/orderlist.php';
            $mainC->getFooter();
        }

        /**
         * gets the account information
         * @param int $id
         */
        function getAccountInfo($id)
        {
            $userRp = new UserRepository();
            $curUser = new User();
            $mainC = new MainController();
            $validateF = new ValidateFunctions();
            $user = $userRp->getOneFromDB($id);
            $curUser->copyToObject(json_decode($user['user_info'], true));
            $address = explode(',', $curUser->getAddress());
            $styleArray = ['','','','current',''];
            $mainC->getHeader('Account Information', $styleArray);
            require_once '../templates/myaccount.php';
            $mainC->getFooter();
        }

        /**
         * action to force the login
         */
        function mustLogin()
        {
            $_SESSION['error'] = ['You must login for that'];
            header("Location:index.php?action=index");
        }
    }
