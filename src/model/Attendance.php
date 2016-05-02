<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/04/2016
 * Time: 19:11
 */

namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Attendance
 * @package Itb\model
 */
class Attendance extends DatabaseTable
{
    /**
     * @var for id
     */
    private $id;
    /**
     * @var for session id
     */
    private $sessionId;
    /**
     * @var for student id
     */
    private $studentId;
    /**
     * @var for date
     */
    private $date;
    /**
     * @var for present
     */
    private $present;
    /**
     * @var for abscent
     */
    private $abscent;

    /**
     * function to get session id
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * function to set the session id
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * function to get student id
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * function to set the student id
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * function to get the date
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * function to set the date
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * function to get the present
     * @return mixed
     */
    public function getPresent()
    {
        return $this->present;
    }

    /**
     * function to set the present
     * @param mixed $present
     */
    public function setPresent($present)
    {
        $this->present = $present;
    }

    /**
     * function to get the abscent
     * @return mixed
     */
    public function getAbscent()
    {
        return $this->abscent;
    }

    /**
     * function to set the abscent
     * @param mixed $abscent
     */
    public function setAbscent($abscent)
    {
        $this->abscent = $abscent;
    }


    /**
     * function to get the id
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
}
