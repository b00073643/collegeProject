<?php
use Itb\Model\Student;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 17/04/2016
 * Time: 00:03
 */
class StudentTest extends \PHPUnit_Framework_TestCase
{

    public function testGetId()
    {
        // Arrange
        $s = new Student();
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
        $s = new Student();
        $expectedResult = 1;

        //Act
        $s->setId(1);
        $result=$s->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSurname()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'murphy';

        //Act
        $s->setSurname('murphy');
        $result=$s->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetSurname()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'murphy';

        //Act
        $s->setSurname('murphy');
        $result=$s->getSurname();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetFirstName()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'mike';

        //Act
        $s->setFirstName('mike');
        $result=$s->getFirstName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetFirstName()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'mike';

        //Act
        $s->setFirstName('mike');
        $result=$s->getFirstName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetJoinDate()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setJoinDate(0);
        $result=$s->getJoinDate();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetJoinDate()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setJoinDate(0);
        $result=$s->getJoinDate();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetLastGrading()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setLastGrading(0);
        $result=$s->getLastGrading();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetLastGrading()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setLastGrading(0);
        $result=$s->getLastGrading();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetCurrentGrade()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setCurrentGrade(0);
        $result=$s->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetCurrentGrade()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setCurrentGrade(0);
        $result=$s->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetAvgGrade()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setAvgGrade(0);
        $result=$s->getAvgGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetAvgGrade()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 0;

        //Act
        $s->setAvgGrade(0);
        $result=$s->getAvgGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetUsername()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'bill';

        //Act
        $s->setUsername('bill');
        $result=$s->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetUsername()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 'bill';

        //Act
        $s->setUsername('bill');
        $result=$s->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetTotalClasses()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setTotalClasses(2);
        $result=$s->getTotalClasses();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetTotalClasses()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setTotalClasses(2);
        $result=$s->getTotalClasses();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetAttendsClass()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setAttendsClass(2);
        $result=$s->getAttendsClass();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetAttendsClass()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setAttendsClass(2);
        $result=$s->getAttendsClass();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetTotalAttendedPercentage()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setTotalAttendedPercentage(2);
        $result=$s->getTotalAttendedPercentage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetTotalAttendedPercentage()
    {
        // Arrange
        $s = new Student();
        $expectedResult = 2;

        //Act
        $s->setTotalAttendedPercentage(2);
        $result=$s->getTotalAttendedPercentage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetpassword()
    {
        // Arrange
        $s = new Student();
        $expectedResult = "password";;

        $s->setPassword( $expectedResult);

        // Act
        $result = $s->getPassword();
        $bool = password_verify("password", $result);
        // Assert
        $this->assertTrue($bool);
    }

    public function testGetpassword()
    {
        // Arrange
        $s = new Student();
        $expectedResult = "password";;

        $s->setPassword( $expectedResult);

        // Act
        $result = $s->getPassword();
        $bool = password_verify("password", $result);
        // Assert
        $this->assertTrue($bool);
    }
}
