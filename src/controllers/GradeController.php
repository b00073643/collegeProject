<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/04/2016
 * Time: 21:00
 */

namespace Itb\Controller;

use Itb\Model\Attendance;
use Itb\Model\Grade;
use Itb\Model\Student;
use Itb\Model\Technique;
use Itb\Model\User;
use Itb\Model\Session;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GradeController
 * @package Itb\Controller
 */
class GradeController
{
    /**
     * function to show a students grade
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function showStudentGrade(Request $request, Application $app)
    {
        $studentA = Student::getOneByUsername($_SESSION['user']);

        $studentId = $studentA->getId();
//        var_dump($studentA);
        $belt = $studentA->getCurrentGrade();
        $studentsTechniques = Technique::searchByColumn('belt', $belt);

        foreach ($studentsTechniques as $tech) {
            //            $tech = Technique::getOneById($techniqueId);
            $techName = $tech->getName();
        }
//        die();
//        $gradeId = Grade::getGradeIdFromStudentIdandTechniqueId($studentId,$techniqueId);

        $student = Student::getOneById($studentId);
//        $technique= Technique::getOneById($techniqueId);

        $grades = Grade::searchByColumn('studentId', $studentId);
        $total = 0;
        foreach ($grades as $g) {
            $total = $total + $g->getScore();
//            die();
        }
        $averageGrade = $total / 3;
        $eligibility = 'not ready yet for grading';

        if ($averageGrade > 3) {
            $lastGrading = $student->getLastGrading();
            $timeSinceLastGrading = $this->monthsSince($lastGrading);
            if ($timeSinceLastGrading > 1) {
                $eligibility = 'ready to grade,longer than 1 month since last grading and average over 3';
            }
        }
        $techs = Technique::searchByColumn('belt', $student->getCurrentGrade());
        $argsArray = [
            'student' => $studentA,
            'grades' => $grades,
            'techs' => $techs,
            'eligibility' => $eligibility
        ];

        $templateName = 'student/showStudentScores';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to update a students grade
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function updateGrade(Request $request, Application $app)
    {
        $_SESSION['role']='admin';
        $score = $request->get('score');
        $studentId = $request->get('studentId');
        $techniqueId = $request->get('techniqueId');
        $tech = Technique::getOneById($techniqueId);
        $techName = $tech->getName();
        $gradeId = $this->getGradeIdFromStudentIdandTechniqueId($studentId, $techniqueId);

        $grade = new Grade();
        $grade->setId($gradeId);
        $grade->setScore($score);
        $grade->setStudentId($studentId);
        $grade->setTechniqueId($techniqueId);
        $student = Student::getOneById($studentId);
        $technique = Technique::getOneById($techniqueId);
        Grade::update($grade);

        $grades = Grade::searchByColumn('studentId', $studentId);
        $total = 0;
        foreach ($grades as $g) {
            $total = $total + $g->getScore();
//            die();
        }

        $averageGrade = $total / 3;

        $eligibility = 'not ready yet for grading';

        if ($averageGrade > 3) {
            $eligibility = 'Average score above a C but not enough time since last grading';

            $lastGrading = $student->getLastGrading();
            $timeSinceLastGrading = $this->monthsSince($lastGrading);
            if ($timeSinceLastGrading > 1) {
                $eligibility = 'ready to grade to next belt';
            }
        }
        $techs = Technique::searchByColumn('belt', $student->getCurrentGrade());
        $argsArray = [
            'technique' => $technique,
            'student' => $student,
            'grade' => $grade,
            'grades' => $grades,
            'techs' => $techs,
            'eligibility' => $eligibility
        ];
        $templateName = 'admin/showStudentScores';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to get the form for updateing a students grade
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function updateGradeForm(Request $request, Application $app)
    {
        if ($_SESSION['role'] = 'user') {
            $studentId = $request->get('studentId');
        }
        $student = Student::getOneById($studentId);
        $belt = $student->getCurrentGrade();
        $techniqueToBeUpdated = Technique::searchByColumn('belt', $belt);
        $argsArray = [
            'techniques' => $techniqueToBeUpdated,
            'student' => $student,
//            'grades'=>$allGrades
        ];

        $templateName = 'admin/showStudentTechniques';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to fill the grades
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function fillGrades(Request $request, Application $app)
    {
        $students = Student::getAll();
        $totalGrades = Grade::getAll();
        if (empty($totalGrades)) {
            foreach ($students as $student) {
                $studentId = $student->getId();
                $name = $student->getFirstName();
                $surname = $student->getSurname();
                $belt = $student->getCurrentGrade();

                $techniques = Technique::searchByColumn('belt', $belt);
                foreach ($techniques as $tech) {
                    $grade = new Grade();

                    $techId = $tech->getId();
                    $grade->setTechniqueId($techId);
                    $grade->setStudentId($studentId);
                    $grade->setScore(0);
                    Grade::insert($grade);
                }
            }
        } else {
            foreach ($students as $student) {
                $studentId = $student->getId();
                $name = $student->getFirstName();
                $surname = $student->getSurname();
                $belt = $student->getCurrentGrade();

                $techniques = Technique::searchByColumn('belt', $belt);
                foreach ($techniques as $tech) {
                    $grade = new Grade();

                    $techId = $tech->getId();
                    $grade->setTechniqueId($techId);
                    $grade->setStudentId($studentId);
                    $grade->setScore(0);

                    Grade::update($grade);
                }
            }
        }
        $allGrades = Grade::getAll();
        $argsArray = [
            'techniques' => $techniques,
            'students' => $students,
            'grades' => $allGrades
        ];
        $templateName = 'admin/adminIndex';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to work our how many months has passed since a date
     * @param $lastGrading
     * @return float
     */
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

    /**
     * function to get a grade id from a student id and a technique id
     * @param $studentId
     * @param $techniqueId
     * @return bool
     */
    public static function getGradeIdFromStudentIdandTechniqueId($studentId, $techniqueId)
    {
        $grades = Grade::searchByColumn('studentId', $studentId);
        foreach ($grades as $grade) {
            if ($grade->getTechniqueId() == $techniqueId) {
                $gradeId= $grade->getId();
                return $gradeId;
            }
        }

        return false;
    }
}
