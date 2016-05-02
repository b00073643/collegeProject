<?php

namespace ItbTests;

use Itb\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRole()
    {
        // Arrange
        $u = new User();
        $expectedResult = 'admin';

        //Act
        $u->setRole('admin');
        $result=$u->getRole();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetRole()
    {
        // Arrange
        $u = new User();
        $expectedResult = 'admin';

        //Act
        $u->setRole('admin');
        $result=$u->getRole();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetId()
    {
        // Arrange
        $u = new User();
        $expectedResult = 0;

        //Act
        $u->setId(0);
        $result=$u->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetId()
    {
        // Arrange
    $u = new User();
        $expectedResult = 0;

    //Act
    $u->setId(0);
        $result=$u->getId();

    // Assert
    $this->assertEquals($expectedResult, $result);
    }
    public function testSetUsername()
    {
        // Arrange
        $u = new User();
        $expectedResult = 'tommy';

        //Act
        $u->setUsername('tommy');
        $result=$u->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGetUsername()
    {
        // Arrange
        $u = new User();
        $expectedResult = 'tommy';

        //Act
        $u->setUsername('tommy');
        $result=$u->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetPassword()
    {
        // Arrange
        $u = new User();
        $password = "password";
        $expectedResult = $password;

        $u->setPassword($expectedResult);

        // Act
        $result = $u->getPassword();
        $bool = password_verify("password", $result);
        // Assert
        $this->assertTrue($bool);
    }

    public function testGetPassword()
    {
        // Arrange
        $u = new User();
        $password = "password";
        $expectedResult = $password;

        $u->setPassword($expectedResult);

        // Act
        $result = $u->getPassword();
        $bool = password_verify("password", $result);
        // Assert
        $this->assertTrue($bool);
    }
}
