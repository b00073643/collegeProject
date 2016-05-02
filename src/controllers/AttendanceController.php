<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/04/2016
 * Time: 21:58
 */
namespace Itb\Controller;

use Itb\Model\Attendance;
use Itb\Model\Student;
use Itb\Model\User;
use Itb\Model\Session;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AttendanceController
 * @package Itb\Controller
 */
class AttendanceController
{
    /**
     * function for attendace page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function attendancePage(Request $request, Application $app)
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role']=='admin') {
                $templateName = 'admin/attendance';
                $argsArray = [];
            } else {
                $templateName = 'error';
                $argsArray = [
                    'message' => 'Sorry you have tried to select an admin feature'
                ];
            }
        } else {
            $templateName = 'error';
            $argsArray = [
                'message' => 'Sorry you have tried to select an admin feature'
            ];
        }
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to process attendance
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function processAttendance(Request $request, Application $app)
    {
        $studentId = $request->get('id');
        $sessionId = $request->get('sessionId');
        $dateString = $request->get('dateString');
        $atten = $request->get('atten');
        $class1 = $request->get('sessionId');
        $attendance = new Attendance();
        $attendance->setSessionId($sessionId);
        $attendance->setStudentId($studentId);
        $attendance->setDate($dateString);
        if ($atten>0) {
            $attendance->setPresent(1);
            $attendance->setAbscent(0);
        } else {
            $attendance->setPresent(0);
            $attendance->setAbscent(1);
        }
        Attendance::insert($attendance);
//         die();
        $class = Session::getOneById($class1);
        $students = Student::searchByColumn('attendsClass', $class1);
        $attendances = Attendance::getAll();
        $templateName = 'admin/markAttendance';
        $argsArray=[
            'students'=>$students,
            'class'=>$class,
            'dateString'=>$dateString,
            'attendances'=>$attendances
        ];
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
//        echo $date->format('U = Y-m-d H:i:s') . "\n";
//        $timestamp = $date->getTimestamp();
//
    }
}
