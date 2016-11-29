<?php
/**
 *  comment
 */

namespace Itb;
use PDO;

/**
 * Class ValidateFunctions
 * @package Itb
 */
class ValidateFunctions
{
    /**
     * gets the sanitized string for the database
     * @param string $item
     * @return string
     */
    function sanitize($item)
    {
        $item = filter_var($item,FILTER_SANITIZE_STRING);
        return $item;
    }

    /**
     *  checks the field if its blank, if the field isnt empty returns true, else false
     * @param string $check
     * @return bool
     */
    function checkFieldForBlank($check)
    {
        if(empty($check) || $check == '')
        {
            return false;
        }
        return true;
    }

    /**
     *  ensures the email is a email
     * @param string $email
     * @return bool
     */
    function checkEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        return true;
    }

    /**
     * checks the passwords match, if not return false. else true
     * @param string $pass
     * @param string $con
     * @return bool
     */
    function passwordCheck($pass, $con)
    {
        if($pass != $con)
        {
            return false;
        }
        return true;
    }

    /**
     * function to validate our contact us page
     * @param array $post
     * @return bool
     */
    function fieldsValid($post)
    {
        foreach ($post as $field)
        {
            if(!$this->checkFieldForBlank($field))
            {
                $_SESSION['error'] = ['Please Ensure all fields are filled out'];
                return false;
            }
        }
        if(!$this->checkEmail($post['contact_email']))
        {
            $_SESSION['error'] = ['Please Enter a valid email'];
            return false;
        }
        return true;
    }

    /**
     * process our shipping details
     * @param array $postInfo
     * @return bool
     */
    function processShippingDetails($postInfo)
    {
        foreach ($postInfo as $field)
        {
            if(!$this->checkFieldForBlank($field))
            {
                return false;
            }
        }
        return true;
    }

    /**
     *  checks if the email is used in the database already
     * @param string $email
     * @return bool
     */
    function emailExists($email)
    {
        $connect = new Config();
        $sql = "SELECT user_email FROM user_DB";
        $query = $connect->connectPDO()->prepare($sql);
        $query->execute();

        while ($emailtoCheck = $query->fetch(PDO::FETCH_ASSOC))
        {
            if($emailtoCheck['user_email'] == $email)
            {
                return false;
            }
        }
        return true;
    }

    /**
     * if we find a email address the same, ths checks if it is used by the previous user, if so it returns true, else false
     * @param string $email
     * @return bool
     */
    function belongToCurrentUser($email)
    {
        $connect = new Config();
        $sql = "SELECT id FROM user_DB WHERE user_email = :email";
        $query = $connect->connectPDO()->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        if($product = $query->fetch())
        {
            if(isset($_GET['id']))
            {
                if($_GET['id'] != $product['id'])
                {
                    return false;
                }
            } else{
                return false;
            }
        }
        return true;
    }

    /**
     * gets our chosen file type
     * @param array $postInfo
     * @return bool
     */
    function accountType($postInfo)
    {
        $accountType = ['regular','gold','editor','admin'];

        foreach ($postInfo as $field)
        {
            if(in_array($field,$accountType))
            {
                return true;
            }
        }
        return false;
    }
}