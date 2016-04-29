<?php

namespace Itb\Controller;

use Itb\Model\Student;
use Itb\Model\User;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{

    public function indexAction(Request $request, Application $app)
    {

        //$templateName = 'index';
        $argsArray=['user'=>'user'];
        if(isset($_SESSION['user']))
        {
            $argsArray=['user'=>$_SESSION['user']];
        }
        if(ISSET($_SESSION['role']))
        {

            if($_SESSION['role']=='admin') {

                $templateName = 'admin/adminIndex';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);

            }

            else if($_SESSION['role']=='user') {
                $templateName = 'student/studentIndex';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);

            }

        }
        else{

            $templateName = 'index';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }



    public function listAction(Request $request, Application $app)
    {
        $users = User::getAll();
        $argsArray = [
            'users'=> $users
        ];
        $templateName = 'listUsers';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function addPage(Request $request, Application $app)
    {
        $templateName = 'admin/addRemove';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function listPage(Request $request, Application $app)
    {
        $templateName = 'admin/listPage';
        return $app['twig']->render($templateName . '.html.twig', []);
    }
    public function attendancePage(Request $request, Application $app)
    {
        $templateName = 'admin/attendance';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function showStudents(Request $request, Application $app)
{

    if(ISSET($_SESSION['role'])) {

        if($_SESSION['role']=='admin') {

            $students = Student::getAll();
            foreach($students as $student)
            {
                $student->setId($student->getId());
                $student->setSurname($student->getSurname());
                $student->setFirstName($student->getFirstName());
//                $student->setPassword($student->getId());
                $student->setJoinDate($student->getJoinDate());
                $student->setLastGrading($student->getLastGrading());
                $student->setCurrentGrade($student->getCurrentGrade());
                $student->setAvgGrade($student->getAvgGrade());
                $student->setAttendsClass($student->getAttendsClass());

                $student->setTotalAttendedPercentage($student->getTotalAttendedPercentage());
                Student::update($student);
            }
            $argsArray = [
                'students' => $students
            ];
            $templateName = 'admin/studentListWithDelete';
        }

        else{
            $message ='Sorry we are afraid you have tried to select an admin feature';
            $argsArray = [
                'message' => $message
            ];
            $templateName = 'error';
        }
            return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }
}

    public function showSingleStudent(Request $request, Application $app)
    {
//        $this->timeSince();
//        die();
        if(ISSET($_SESSION['role'])) {
            if($_SESSION['role']=='user')
            {
                $student = Student::getOneByUsername($_SESSION['user']);
                $lastGrading = $student->getLastGrading();
                $templateName = 'student/showSingleStudent';
                $timeSinceLastGrading = $this->monthsSince($lastGrading);
                $argsArray = [
                    'student' => $student,
                    'timeSince'=>$timeSinceLastGrading
                ];

            }
            if($_SESSION['role']=='admin') {
                $id = $request->get('studentId');
                $student = Student::getOneById($id);
                $templateName = 'admin/showSingleStudent';
                $argsArray = [
                    'student' => $student,
                ];

            }


                return $app['twig']->render($templateName . '.html.twig', $argsArray);
            }
        }

        public function monthsSince($lastGrading)
        {

                $time = strtotime($lastGrading);
                $time = time() - $time; // to get the time since that moment

                $time = ($time < 1) ? 1 : $time;
                $token = 2592000;// this amount of untis is equal to one month

                $numberOfUnits = floor($time / $token);
                $months = $numberOfUnits;// . 'Months since last grading';
            return $months;

        }
    public function showMissingAction(Request $request, Application $app)
    {

        $message= 'Sorry no ID was entered';

        $argsArray = [
            'message'=> $message
        ];
        $templateName='error';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }

    public function errorAction(Application $app, $code)
    {
        $message = '404 Error sorry cant find resource';
        if($code != 404)
        {
            $message='Sorry UNKOWN ERROR OCCURRED';
        }
        $argsArray = [
            'message'=> $message
        ];
        $templateName='error';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


}

