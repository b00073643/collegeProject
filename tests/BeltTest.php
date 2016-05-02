<?php


namespace ItbTests;

use Itb\Model\Belt;
class BeltTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $b = new Belt();
        $expectedResult = 0;

        //Act
        $b->setId(0);
        $result=$b->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $b = new Belt();
        $expectedResult = 0;

        //Act
        $b->setId(0);
        $result=$b->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetName()
    {
        // Arrange
        $b = new Belt();
        $expectedResult = 'bill';

        //Act
        $b->setName('bill');
        $result=$b->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetName()
    {
        // Arrange
        $b = new Belt();
        $expectedResult = 'bill';

        //Act
        $b->setName('bill');
        $result=$b->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

}