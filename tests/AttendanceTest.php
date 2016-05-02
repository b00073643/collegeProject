<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/04/2016
 * Time: 00:35
 */

namespace ItbTests;

use Itb\Model\Attendance;

class AttendanceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setId(0);
        $result=$a->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setId(0);
        $result=$a->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSessionId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setSessionId(0);
        $result=$a->getSessionId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetSessionId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setSessionId(0);
        $result=$a->getSessionId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetStudentId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setStudentId(0);
        $result=$a->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetStudentId()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setStudentId(0);
        $result=$a->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetDate()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setDate(0);
        $result=$a->getDate();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetDate()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setDate(0);
        $result=$a->getDate();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetPresent()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setPresent(0);
        $result=$a->getPresent();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetPresent()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setPresent(0);
        $result=$a->getPresent();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetAbscent()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setAbscent(0);
        $result=$a->getAbscent();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetAbscent()
    {
        // Arrange
        $a = new Attendance();
        $expectedResult = 0;

        //Act
        $a->setAbscent(0);
        $result=$a->getAbscent();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
