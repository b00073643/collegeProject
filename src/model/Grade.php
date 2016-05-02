<?php
/**
 * class for grades
 */

namespace Itb\model;

/**
 *
 */
use Mattsmithdev\PdoCrud\DatabaseTable;
use Itb\Model\Student;

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
     * can find matching username and password method
     * @param $username
     * @param $password
     * @return bool
     */
//    public static function canFindMatchingUsernameAndPassword($username, $password)
//    {
//        $user = Student::getOneByUsername($username);
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
     * methos to get
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
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getTechniqueId()
    {
        return $this->techniqueId;
    }

    /**
     * @param mixed $technique
     */
    public function setTechniqueId($techniqueId)
    {
        $this->techniqueId = $techniqueId;
    }

    /**
     * get a grade id from a student id and a technique id
     * @param $studentId
     * @param $techniqueId
     * @return bool
     */
//    public static function getGradeIdFromStudentIdandTechniqueId($studentId, $techniqueId)
//    {
//        $grades = Grade::searchByColumn('studentId', $studentId);
//        foreach ($grades as $grade) {
//            if ($grade->getTechniqueId() == $techniqueId) {
//                $gradeId= $grade->getId();
//                return $gradeId;
//            }
//        }
//
//        return false;
//    }
}
