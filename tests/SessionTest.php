<?php

namespace ItbTests;

use Itb\Model\Session;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 0;

        //Act
        $s->setId(0);
        $result=$s->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 1;

        //Act
        $s->setId(1);
        $result=$s->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetName()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 'bob';

        //Act
        $s->setName($expectedResult);
        $result=$s->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetName()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 'beginner';

        //Act
        $s->setName($expectedResult);
        $result = $s->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetInstructor()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 'bob';

        //Act
        $s->setInstructor($expectedResult);
        $result = $s->getInstructor();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetInstructor()
    {
        // Arrange
        $s = new Session();
        $expectedResult = 'bob';

        //Act
        $s->setInstructor($expectedResult);
        $result = $s->getInstructor();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
