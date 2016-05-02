<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/04/2016
 * Time: 00:19
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Technique
 * @package Itb\model
 */
class Technique extends DatabaseTable
{
    /**
     * @var for id
     */
    private $id;
    /**
     * @var for belt
     */
    private $belt;
    /**
     * @var for name
     */
    private $name;

    /**
     * method to return name
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
     * method to get id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * method to set id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * method to get belt
     * @return mixed
     */
    public function getBelt()
    {
        return $this->belt;
    }

    /**
     * method to set belt
     * @param mixed $belt
     */
    public function setBelt($belt)
    {
        $this->belt = $belt;
    }
}
