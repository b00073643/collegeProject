<?php


namespace ItbTests;

use Itb\Model\Technique;

class TechniqueTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 0;

        //Act
        $t->setId(0);
        $result=$t->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 0;

        //Act
        $t->setId(0);
        $result=$t->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGetName()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 'red';

        //Act
        $t->setName('red');
        $result=$t->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetName()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 'red 1';

        //Act
        $t->setName('red 1');
        $result=$t->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetBelt()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 'red';

        //Act
        $t->setBelt('red');
        $result=$t->getBelt();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetBelt()
    {
        // Arrange
        $t = new Technique();
        $expectedResult = 'red';

        //Act
        $t->setBelt('red');
        $result=$t->getBelt();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
