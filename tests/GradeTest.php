<?php


namespace ItbTests;

use Itb\Model\Grade;
class GradeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 0;

        //Act
        $g->setId(0);
        $result=$g->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 0;

        //Act
        $g->setId(0);
        $result=$g->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetStudentId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setStudentId(1);
        $result=$g->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetStudentId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setStudentId(1);
        $result=$g->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetTechniqueId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setTechniqueId(1);
        $result=$g->getTechniqueId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetTechniqueId()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setTechniqueId(1);
        $result=$g->getTechniqueId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetScore()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setScore(1);
        $result=$g->getScore();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetScore()
    {
        // Arrange
        $g = new Grade();
        $expectedResult = 1;

        //Act
        $g->setScore(1);
        $result=$g->getScore();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

}