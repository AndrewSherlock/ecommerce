<?php
/**
 * comment
 */
namespace Itb;

use PDO;

/**
 * Class OrderCrud
 * @package Itb
 */
class OrderCrud
{

    /**
     * gets the orders we want to show
     * @param int $dispatched
     * @param int $amount_to_show
     * @return array
     */
    function getOrderInfo($dispatched, $amount_to_show)
    {
        $connect = new Config();
        $sql = "SELECT * FROM orders_db WHERE order_dispatched = :dispatched LIMIT :amount";
        $query = $connect->connectPDO()->prepare($sql);
        $query->bindParam(':dispatched', $dispatched, \PDO::PARAM_INT);
        $query->bindParam(':amount', $amount_to_show, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     *  finds the order from out database
     * @param int $id
     * @return array
     */
    function orderFromDatabase($id)
    {
        $connect = new Config();
        $sql = "SELECT * FROM orders_db WHERE order_id = :id";
        $query = $connect->connectPDO()->prepare($sql);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * checks the cart and ets the product info for each of them and returns that
     * @param array $orderItems
     * @return array
     */
    function getOrderItems($orderItems)
    {
        $connect = new Config();
        $sql = "SELECT * FROM products_db";
        $query = $connect->connectPDO()->prepare($sql);
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        $productToGetInfo = [];
        for ($i = 0; $i < count($orderItems); $i++) {
            for ($c = 0; $c < count($products); $c++) {
                if ($products[$c]['id'] == $orderItems[$i][0]) {
                    $obj = new Product();
                    $obj->copyToProduct(json_decode($products[$c]['product_info'], true));
                    $products[$c]['product_info'] = $obj;
                    $productToGetInfo[] = $products[$c];
                    break;
                }
            }
        }
        return $productToGetInfo;
    }

    /**
     *  Updates the status of our order in the DB
     * @param int $status
     * @param int $id
     */
    function updateOrderStatus($status, $id)
    {
        $connect = new Config();
        $sql = "UPDATE orders_db SET order_status = :status WHERE order_id = :id";
        $query = $connect->connectPDO()->prepare($sql);
        $query->bindParam(':status', $status, \PDO::PARAM_STR);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * updates the order in the database and adds a message.
     * @param int $id
     */
    function dispatchOrder($id)
    {
        $connect = new Config();
        $message = 'Order Dispatched - ' . date("Y-m-d H:i:s");
        $sql = "UPDATE orders_db SET order_dispatched = 1, order_status = :message WHERE order_id =:id";
        $query = $connect->connectPDO()->prepare($sql);
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->bindParam(':message', $message, \PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Gets our dispatched orders from our database
     * @param int $id
     * @return array
     */
    function getDispatchedOrders($id)
    {
        $connect = new Config();
        if ($id == 0) {
            $sql = "SELECT * FROM orders_db WHERE order_dispatched = 1";
        } else {
            $sql = "SELECT * FROM orders_db WHERE user_id = :id";
        }
        $query = $connect->connectPDO()->prepare($sql);
        if ($id != 0) {
            $query->bindParam(':id', $id, \PDO::PARAM_INT);
        }
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * gets all our orders
     * @return array
     */
    function getAllOrderData()
    {
        $connect = new Config();
        $sql = "SELECT * FROM orders_db";
        $query = $connect->connectPDO()->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}