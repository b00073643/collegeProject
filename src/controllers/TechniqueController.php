<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/04/2016
 * Time: 01:49
 */

namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\Technique;

class TechniqueController
{
    public function syllabus(Request $request, Application $app)
    {
        $techniques = Technique::getAll();

        $argsArray = [
            'techniques' => $techniques
        ];

        $templateName = 'student/syllabusList';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


        // redirect to index action

    }

}