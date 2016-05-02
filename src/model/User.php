<?php
/**
 * class for user
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class User
 * @package Itb\model
 */
class User extends DatabaseTable
{
    /**
     * variables for role
     */
    const ROLE_USER = 'user';
    /**
     * variables for role
     */
    const ROLE_ADMIN = 'admin';
    /**
     * @var for id
     */
    private $id;
    /**
     * @var for username
     */
    private $username;
    /**
     * @var for password
     */
    private $password;
    /**
     * @var for role
     */
    private $role;

    /**
     * function to get id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * function to set the id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * function to get the username
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * function to set the username
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * function to get the password
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * function to get the role
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * function to set the role
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * hash the password before storing ...
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }

    /**
     * function to find a username and password
     * @param $username
     * @param $password
     * @return bool
     * @codeCoverageIgnore
     */
//    public static function canFindMatchingUsernameAndPassword($username, $password)
//    {
//        $user = User::getOneByUsername($username);
//
//        // if no record has this username, return FALSE
//        if (null == $user) {
//            return false;
//        }
//
//        // hashed correct password
//        $hashedStoredPassword = $user->getPassword();
//
//        // return whether or not hash of input password matches stored hash
//        return password_verify($password, $hashedStoredPassword);
//    }

    /**
     * function to find a username and password
     * @param $username
     * @param $password
     * @return bool
     * @codeCoverageIgnore
     */
//    public static function canFindMatchingAdminUsernameAndPassword($username, $password)
//    {
//        $user = User::getOneByUsername($username);
//
//        // if no record has this username, return FALSE
//        if (null == $user) {
//            return false;
//        }
//
//        // hashed correct password
//        $hashedStoredPassword = $user->getPassword();
//        $isAdmin= $user->getRole();
//        echo"$isAdmin";
//        // return whether or not hash of input password matches stored hash
//        return $isAdmin;
//    }
    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     * @codeCoverageIgnore
     * @return mixed|null
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
