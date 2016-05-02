<?php
/**
 * class for grades
 */

/**
 * name space to be used
 */
namespace Itb\model;

/**
 *use the CRUD
 */
use Mattsmithdev\PdoCrud\DatabaseTable;

/**
 * Class Grade
 * @package Itb\model
 */
class Grade extends DatabaseTable
{
    /**
     * Id of user
     * @var id
     */
    private $id;
    /**
     * Id of student
     * @var studenId
     */
    private $studentId;
    /**
     * techique id
     * @var techniqueId
     *
     */
    private $techniqueId;

    /**
     * score of technique displayed
     * @var score
     */
    private $score;

    /**
     * method to get the id
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
     * method to get the student id
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * method to set the student id
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * method to return score
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * method to set the score
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * method to get technique
     * @return mixed
     */
    public function getTechniqueId()
    {
        return $this->techniqueId;
    }

    /**
     * method to set the technique
     * @param mixed $technique
     */
    public function setTechniqueId($techniqueId)
    {
        $this->techniqueId = $techniqueId;
    }
}
