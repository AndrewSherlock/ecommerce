<?php
/**
 *  Comment
 */

namespace Itb;
use PDO;

/**
 * Class ImageRespository
 * @package Itb
 */
class ImageRespository
{

    /**
     * @var string image link
     */
    private $imageLink;

    /**
     *  Checks if our file is a image, if not false, else true
     * @param array $fileType
     * @return bool
     */
    public function isImage($fileType)
    {
        $type = explode('/',$fileType);
        $index = count($type) - 1;
        $allowedTypes = ['jpeg','jpg','png','gif'];
        if(!in_array($type[$index],$allowedTypes))
        {
            return false;
        }
        if($type[0] != 'image')
        {
            return false;
        }
        return true;
    }

    /**
     * Checks if our image is under a certain size, true, else false
     * @param integer $imgSize
     * @param integer $maxSize
     * @return bool
     */
    public function checkImgSize($imgSize, $maxSize)
    {
        if($imgSize > $maxSize)
        {
            return false;
        }
        return true;
    }

    /**
     *  Gets our next id for use in our image creation
     * @param string $table
     * @return int
     */
    public function getNextId($table)
    {
        $connect = new Config();
        $sql = "SELECT MAX(id) AS id FROM $table";
        $query = $connect->connectPDO()->prepare($sql);
        $query->execute();
        $idQ = $query->fetch(\PDO::FETCH_ASSOC);
        $id = (int)$idQ['id'];
        return $id;
    }

    /**
     * Uploads our image and returns the link that the image is uploaded to
     * @param array $img
     * @param integer $id
     * @param string $table
     * @return string
     */
    public function uploadImage($img, $id, $table)
    {
        $validateF = new ValidateFunctions();
        $tmp_name = $img['file_upload']['tmp_name'];
        $name = explode('.',$validateF->sanitize($img['file_upload']['name']));
        $newName = (int)microtime(true).$id.'.'.$name[1];
        $this->imageLink = '/images/'.$table.'s/'.$newName;
        $upload_link = $_SERVER['DOCUMENT_ROOT'].$this->imageLink;
        move_uploaded_file($tmp_name,$upload_link);
        return $this->imageLink;
    }

    /**
     * Gets our image link
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

}