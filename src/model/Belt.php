<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/04/2016
 * Time: 21:12
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;

class Belt extends DatabaseTable
{

    private $id;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
