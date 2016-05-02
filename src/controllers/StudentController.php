<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29/04/2016
 * Time: 10:40
 */

namespace Itb\Controller;

use Itb\Model\Grade;
use Itb\Model\Student;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudentController
 * @package Itb\Controller
 */
class StudentController
{
    /**
     * function to add a student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function addStudent(Request $request, Application $app)
    {
        $userName = $request->get('userName');
        $firstName = $request->get('firstName');
        $surname=$request->get('surname');
        $password=$request->get('password');
        $attendsClass=$request->get('classType');

        $allStudents = Student::getAll();
        foreach ($allStudents as $s) {
            $un=$s->getUsername();
            if ($userName==$un) {
                $argsArray = ['message' => 'please choose a different username'];
                $templateName = 'admin/addStudent';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);
                die();
            }
        }
        $ts =new \DateTime();
        $t=$ts->getTimestamp();
        $date = new \DateTime();
        $student = new Student();
//        $student->setId(25);
        $student->setUserName($userName);
        $student->setSurname($surname);
        $student->setFirstName($firstName);
        $student->setPassword($password);
        $student->setJoinDate($date->format('d-m-Y'));
        $student->setLastGrading($date->format('d-m-Y'));
        $student->setCurrentGrade(9);
        $student->setAvgGrade('E');
        $student->setAttendsClass($attendsClass);
        $student->setTotalAttendedPercentage(0);
        Student::insert($student);
        $student=Student::getOneByUsername($userName);
        $studentId=$student->getId();
        $grade = new Grade();
        $grade->setStudentId($studentId);
        $grade->setScore(0);
        $grade->setTechniqueId(10);
        Grade::insert($grade);

        $grade1 = new Grade();
        $grade1->setStudentId($studentId);
        $grade1->setScore(0);
        $grade1->setTechniqueId(10);
        Grade::insert($grade1);

        $grade2 = new Grade();
        $grade2->setStudentId($studentId);
        $grade2->setScore(0);
        $grade2->setTechniqueId(10);
        Grade::insert($grade2);

        $argsArray = ['student' => $student];
        $templateName = 'admin/showSingleStudent';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
