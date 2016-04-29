<?php

namespace ItbTests;

use Itb\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
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

    public function testSetRole()
    {
        // Arrange
        $u = new User();
        $expectedResult = 'admin';

        //Act
        $u->setUsername('admin');
        $result=$u->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testGetRole()
    {
        // Arrange
    $u = new User();
        $expectedResult = 'admin';

    //Act
    $u->setUsername('admin');
        $result=$u->getUsername();

    // Assert
    $this->assertEquals($expectedResult, $result);
    }

    public function testGetcanFindMatchingAdminUsernameAndPassword()
    {
        // Arrange
        $u = new User();
        $expectedResult = true;

        //Act
        $user=$u->setUsername('admin');
        $pass=$u->setPassword('pass');
        $result=$u->canFindMatchingUsernameAndPassword($user, $pass);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
