<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/04/2016
 * Time: 01:49
 */

namespace Itb\Controller;

use Itb\Model\Belt;
use Itb\Model\Student;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\Technique;

class TechniqueController
{
    public function syllabus(Request $request, Application $app)
    {
        $beltId = $request->get('beltId');
        $techniques = Technique::searchByColumn('belt', $beltId);

        $argsArray = [
            'techniques' => $techniques
        ];

        $templateName = 'student/syllabusList';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


        // redirect to index action
    }

    public function listBelts(Request $request, Application $app)
    {
        $username = $_SESSION['user'];
        $student = Student::getOneByUsername($username);
        $currentGrade = $student->getCurrentGrade();

        $belts = Belt::getAll();
        $argsArray = [
            'studentBeltId'=>$currentGrade,
            'belts' => $belts
        ];

        $templateName = 'student/beltList';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


        // redirect to index action
    }
}
