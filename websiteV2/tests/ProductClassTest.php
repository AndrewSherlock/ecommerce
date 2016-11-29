<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 28/11/2016
 * Time: 22:30
 */

namespace Itb;
use PHPUnit_Framework_Test;

class ProductClassTest extends \PHPUnit_Framework_TestCase
{
    public function testName()
    {
        $testItem = new Product();
        $testItem->setName('Test Item');

        $check = $testItem->getName();
        $this->assertEquals('Test Item', $check);
    }

    public function testDescription()
    {
        $testItem = new Product();
        $testItem->setDescription('Description');

        $check = $testItem->getDescription();
        $this->assertEquals('Description', $check);
    }

    public function testImage()
    {
        $testItem = new Product();
        $testItem->setImage('Image');

        $check = $testItem->getImage();
        $this->assertEquals('Image', $check);
    }

    public function testSize()
    {
        $testItem = new Product();
        $testItem->setSize('Size');

        $check = $testItem->getSize();
        $this->assertEquals('Size', $check);
    }


    public function testPrice()
    {
        $testItem = new Product();
        $testItem->setPrice(19.99);

        $check = $testItem->getPrice();
        $this->assertEquals(19.99, $check);
    }

    public function testIsJson()
    {
        $testProduct = new Product();
        $testProduct->setName('Name');
        $testProduct->setDescription('Description');
        $testProduct->setPrice(19.99);
        $testProduct->setSize('small:12');
        $testProduct->setImage('/link/image.jpg');

        $json = $testProduct->productToJson();

        $this->assertJson($json,'');
    }

    public function testProductFromJson()
    {
        $testProduct = new Product();
        $testProduct->setName('Name');
        $testProduct->setDescription('Description');
        $testProduct->setPrice(19.99);
        $testProduct->setSize('small:12');
        $testProduct->setImage('/link/image.jpg');

        $json = $testProduct->productToJson();

        $testObj = new Product();
        $testObj->productFromJson($json);

        $this->assertEquals($testObj, $testProduct);
    }

    public function testCopyToProduct()
    {
        $testProduct = new Product();
        $testProduct->setName('Name');
        $testProduct->setDescription('Description');
        $testProduct->setPrice(19.99);
        $testProduct->setSize('small:12');
        $testProduct->setImage('/link/image.jpg');

        $json = $testProduct->productToJson();
        $json = json_decode($json,true);

        $test2 = new Product();
        $test2->copyToProduct($json);
        $this->assertEquals($test2, $testProduct);
    }


}