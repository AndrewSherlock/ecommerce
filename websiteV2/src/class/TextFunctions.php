<?php
/**
 * Comment
 */

namespace Itb;

/**
 * Class TextFunctions
 * @package Itb
 */
class TextFunctions
{

    /**
     * builds the string for use with our admin
     * @param string $size
     * @return string
     */
    public function buildSizeString($size)
    {
        $builtString = '';
        $sizeType = explode(',', $size);
        foreach($sizeType as $type)
        {
            $cutArray = explode(':',$type);
            $size = $this->getSizeShort($cutArray[0]);
            $builtString .= $size.' ~ '.$cutArray[1].' ';
        }
        return $builtString;
    }

    /**
     * gets the short version of size
     * @param string $s
     * @return string
     */
    public function getSizeShort($s)
    {
        switch ($s)
        {
            case 'extrasmall':
                return 'XS';
                break;
            case 'small':
                return 'S';
                break;
            case 'medium':
                return 'M';
                break;
            case 'large':
                return 'L';
                break;
            case 'extralarge':
                return 'XL';
                break;
            default:
                return '';
        }
    }

    /**
     *  builds the string for storage in the database
     * @param array $post
     * @return string
     */
    public function buildSizesForDatabase($post)
    {
        $count = 0;
        $alpha = ['A','B','C','D','E'];
        $string = '';
        while ($count < 5)
        {
            if($post['product_size'.$alpha[$count]] == '')
            {
                return $string;
            } else{
                $string .= (($count==0)?'':',');
                $string .= strtolower($post['product_size'.$alpha[$count]]).':'.$post['product_qty'.$alpha[$count]];
                $count++;
            }
        }
        return $string;
    }

    /**
     * splits the string for use in the shop
     * @param string $size
     * @return array
     */
    public function deconstructString($size)
    {
        $builtArray = [];
        $string = explode(',', $size);
        for($i = 0; $i < count($string); $i++)
        {
            $builtArray[$i] = explode(':',$string[$i]);
        }
        return $builtArray;
    }

    /**
     * formats my money for front end
     * @param float $amount
     * @return string
     */
    public function displayMoney($amount)
    {
        return '€'.number_format($amount,2);
    }

    /**
     * rebuilds the string with the new quantity
     * @param string $sizes
     * @return string
     */
    public function buildNewQty($sizes)
    {
        $count = 0;
        $string = '';

        foreach ($sizes as $size)
        {
            if($size == '')
            {
                return $string;
            } else{
                $string .= (($count==0)?'':',');
                $string .= $size[0].':'.$size[1];
                $count++;
            }
        }
        return $string;
    }

    /**
     *  shows the status of our messages to the user
     * @param string $status
     */
    public function displayStatus($status)
    {
        foreach ($status as $mess)
        {
            echo $mess.PHP_EOL;
        }
        $mess = [];
    }

    /**
     *  breaks the value into cent for stripe
     * @param int $amount
     * @return float
     */
    public function centToEuro($amount)
    {
        $euroValue = (float) $amount / 100;
        return $euroValue;
    }

    /**
     *  gets int value from the storage of percent in database
     * @param float $float
     * @return string
     */
    public function getPercentFromFloat($float)
    {
        $percent = $float * 100;
        $percent = (int)$percent;
        return $percent.'%';
    }

    /**
     * convert our int to float
     * @param int $percent
     * @return float
     */
    public function floatToPercent($percent)
    {
        $percent = (float)$percent;
        $float = $percent/100;
        return $float;
    }

    /**
     * function to hash our passwords
     * @param string $p
     * @return bool|string
     */
    public function password_encryption($p)
    {
        $p = password_hash($p, PASSWORD_BCRYPT);
        return $p;
    }
}