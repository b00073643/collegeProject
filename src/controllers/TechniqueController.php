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

/**
 * Class TechniqueController
 * @package Itb\Controller
 */
class TechniqueController
{
    /**
     * function to display grades associated with a belt
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
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

    /**
     * function to list the belts
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
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
