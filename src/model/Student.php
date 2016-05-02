<?php
/**
 * student class
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Student
 * @package Itb\Model
 */
class Student extends DatabaseTable
{
    /**
     * @var for id
     */
    private $id;
    /**
     * @var for surname
     */
    private $surname;
    /**
     * @var for first name
     */
    private $firstName;
    /**
     * @var for password
     */
    private $password;
    /**
     * @var for join date
     */
    private $joinDate;
    /**
     * @var for last grading
     */
    private $lastGrading;
    /**
     * @var for current grade
     */
    private $currentGrade;
    /**
     * @var for average grade
     */
    private $avgGrade;
    /**
     * @var for username
     */
    private $username;
    /**
     * @var for attending class
     */
    private $attendsClass;
    /**
     * @var for attendace percentage
     */
    private $totalAttendedPercentage;

    /**
     * function to get username
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * function to set username
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * function to get total attended percentage
     * @return for
     */
    public function getTotalAttendedPercentage()
    {
        return $this->totalAttendedPercentage;
    }

    /**
     * function to set the total attended percentage
     * @param $t
     */
    public function setTotalAttendedPercentage($t)
    {
        $this->totalAttendedPercentage = $t;
    }
//    public function setTotalAttendedPercentage()
//    {
//        $studentAttendance = Attendance::searchByColumn('studentId',$this->id);
//        $totalPresent=0;
//        $totalAbscent=0;
//        foreach ($studentAttendance as $sa) {
//            $totalPresent+=$sa->getPresent();
//            $totalAbscent+=$sa->getAbscent();
//        }
//        $totalClasses=$totalPresent+$totalAbscent;
//        if ($totalClasses < 1) {
//            $this->totalAttendedPercentage=0;
//        }
//        else {
//            $percent = (100 * $totalPresent) / $totalClasses;
//            $this->totalAttendedPercentage = intval($percent);
//        }
//    }
    /**
     * function to get total classes
     * @return mixed
     */
    public function getTotalClasses()
    {
        return $this->totalClasses;
    }
    /**
     * set total classes
     * @param mixed $totalClasses
     */
    public function setTotalClasses($totalClasses)
    {
        $this->totalClasses = $totalClasses;
    }
    /**
     * function to find ou which class a student attends
     * @return mixed
     */
    public function getAttendsClass()
    {
        return $this->attendsClass;
    }
    /**
     * function to set which class a student takes part of
     * @param mixed $attendsClass
     */
    public function setAttendsClass($attendsClass)
    {
        $this->attendsClass = $attendsClass;
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
     * function to return the id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * function to set the id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * function to get the surname
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * function to get the surname
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    /**
     * function to get first name
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * function to set the first name
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    /**
     * function to get the joining date
     * @return float
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }
    /**
     * function to set the joining date
     * @param float $joinDate
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    }
    /**
     * function to get the last grading
     * @return int
     */
    public function getLastGrading()
    {
        return $this->lastGrading;
    }
    /**
     * function to set the last grading
     * @param int $lastGrading
     */
    public function setLastGrading($lastGrading)
    {
        $this->lastGrading = $lastGrading;
    }
    /**
     * function to set the current grade
     * @return int
     */
    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }
    /**
     * function to set the current grade
     * @param int $currentGrade
     */
    public function setCurrentGrade($currentGrade)
    {
        $this->currentGrade = $currentGrade;
    }
    /**
     * function to get the average grade
     * @return mixed
     */
    public function getAvgGrade()
    {
        return $this->avgGrade;
    }
    /**
     * function to get the average grade
     * @param mixed $avgGrade
     */
    public function setAvgGrade($avgGrade)
    {
        $this->avgGrade = $avgGrade;
    }

    /**
     * function to set the password
     * @param $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

//    public static function canFindMatchingUsernameAndPassword($username, $password)
//    {
//        $user = Student::getOneByUsername($username);
//        // if no record has this username, return FALSE
//        if(null == $user){
//            return false;
//        }
//        // hashed correct password
//        $hashedStoredPassword = $user->getPassword();
//        // return whether or not hash of input password matches stored hash
//        return password_verify($password, $hashedStoredPassword);
//    }
    /**
     * Method to find a user by their username
     * @param $firstName
     * @return mixed|null
     * @codeCoverageIgnore
     */
    public static function getOneByUsername($firstName)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();
        $sql = 'SELECT * FROM students WHERE firstName=:firstName';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':firstName', $firstName, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();
        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
