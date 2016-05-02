<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/04/2016
 * Time: 15:22
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Session
 * @package Itb\model
 */
class Session extends DatabaseTable
{
    /**
     * @var id for the id
     */
    private $id;

    /**
     * @var for name
     */
    private $name;

    /**
     * @var for instructor
     */
    private $instructor;

    /**
     * method to return id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * method to set the id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * method to get name
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * method to set name
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * method to get get instruction
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * method to get instructors name
     * @param mixed $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }
}
