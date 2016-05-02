<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/04/2016
 * Time: 21:12
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Belt
 * @package Itb\model
 */
class Belt extends DatabaseTable
{
    /**
     * @var for id
     */
    private $id;
    /**
     * @var for name
     */
    private $name;

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
     * function to set the name
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * function to get the name
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
