<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/04/2016
 * Time: 11:15
 */

namespace Itb\Controller;

use Itb\Model\Attendance;
use Itb\Model\Student;
use Itb\Model\User;
use Itb\Model\Session;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @package Itb\Controller
 */
class AdminController
{
    /**
     * function for admin home page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminHomeAction(Request $request, Application $app)
    {
        $isLoggedIn = $this->loginController->isAdminLoggedInFromSession();
        if ($isLoggedIn) {
            $username = $this->loginController->usernameFromSession();
            $templateName = 'adminIndex';
            $argsArray=['user'=>$username];
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            $templateName = 'loginFail';

            $message = 'UNAUTHORIZED ACCESS - the Guards are on their way to arrest you ...';
            $argsArray=['message'=>$message];

            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

    /**
     * function for attendance page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function attendance(Request $request, Application $app)
    {
        $username = $_SESSION['user'];
        $templateName = 'admin/attendance';
        $argsArray=['user'=>$username];
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function for marking attendance page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function markAttendance(Request $request, Application $app)
    {
        $class = $request->get('classes');
        $month = $request->get('JoinMonth');
        $day = $request->get('JoinDay');
        $year = $request->get('JoinYear');

        $dateString = $day.'-'.$month.'-'.$year;
        $timestamp = strtotime("$day-$month-$year");
        $class1 = Session::getOneById($class);

        $attendances = Attendance::getAll();

        $students = Student::searchByColumn('attendsClass', $class);

        $templateName = 'admin/markAttendance';

        $argsArray=[
            'students'=>$students,
            'class'=>$class1,
            'dateString'=>$dateString,
            'attendances'=>$attendances
        ];

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to add a student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function addStudentForm(Request $request, Application $app)
    {
        $templateName = '/admin/addStudent';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * function to delete a student
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function deleteStudent(Request $request, Application $app)
    {
        $id = $request->get('id');
        $deleteSuccess = Student::delete($id);
        if ($deleteSuccess) {
            $students = Student::getAll();
            $templateName = 'admin/studentListWithDelete';
            $argsArray=['students'=>$students];

            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            $templateName = 'error';
            $message = "error - not able to DELETE item with id = $id";
            $argsArray=['message'=>$message];
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }
}
