<?php
/**
 *  This is basic configuration.
 */

namespace Itb;

use PDO;
/**
 * Class Config
 * @package Itb
 */
class Config
{
    /**
     * Gives us our database connection
     * @return PDO
     */
    function connectPDO()
    {
        $server = 'localhost';
        $username = 'root';
        $password = 'root';

        try {
            $connect = new PDO("mysql:host=$server;dbname=shop", $username, $password);
        } catch (PDOException $e) {
            echo 'Connection to Database Failed' . $e->getMessage();
            die();
        }
        return $connect;
    }
}