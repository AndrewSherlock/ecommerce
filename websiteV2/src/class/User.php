<?php
/**
 *  comment
 */

namespace Itb;

/**
 * Class User
 * @package Itb
 */
class User
{
    /**
     * Name of the user
     * @var string
     */
    private $name;
    /**
     * Email of the user
     * @var string
     */
    private $email;
    /**
     * Number of the user
     * @var string
     */
    private $phone;
    /**
     * Address of the user
     * @var string
     */
    private $address;
    /**
     * Image link of the user
     * @var string
     */
    private $image;
    /**
     * Password of the user
     * @var string
     */
    private $password;
    /**
     * Account type of the user
     * @var string
     */
    private $accountType;
    /**
     * Added by user
     * @var string
     */
    private $addedBy;

    /**
     * gets the name of user
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * sets the name of our user
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * gets the email of our user
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * sets the email of the user
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * gets the user phone number
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * sets the phone number of the user
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * gets the address of our user
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * sets the address of the user
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * gets the image link of our user
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * sets the image link of our image
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * gets the password of our user
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *  sets the password of the user
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * gets the account type of the user
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * sets the account type of the user
     * @param string $accountType
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * gets the added by user
     * @return string
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * sets the added by user
     * @param string $addedBy
     */
    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;
    }

    /**
     * sets the user object to a string
     * @return string
     */
    public function userToJson()
    {
        return json_encode([
            'userName'       => $this->name,
            'user_email'     => $this->email,
            'user_phone'     => $this->phone,
            'user_address'   => $this->address,
            'user_image'     => $this->image,
            'user_password'  => $this->password,
            'user_account'   => $this->accountType,
            'user_added'   => $this->addedBy
        ]);
    }

    /**
     * sets the user fields from json string from database
     * @param string $jsonString
     */
    public function userFromJson($jsonString)
    {
        $user = json_decode($jsonString, true);
        $this->name = $user['userName'];
        $this->email = $user['user_email'];
        $this->phone = $user['user_phone'];
        $this->address = $user['user_address'];
        $this->image = $user['user_image'];
        $this->password = $user['user_password'];
        $this->accountType = $user['user_account'];
        $this->addedBy = $user['user_added'];

    }

    /**
     * takes an array and gives the objects the values from array
     * @param array $objArray
     */
    public function copyToObject($objArray)
    {
        $this->name = $objArray['userName'];
        $this->email = $objArray['user_email'];
        $this->phone = $objArray['user_phone'];
        $this->address = $objArray['user_address'];
        $this->image = $objArray['user_image'];
        $this->password = $objArray['user_password'];
        $this->accountType = $objArray['user_account'];
        $this->addedBy = $objArray['user_added'];
    }
}