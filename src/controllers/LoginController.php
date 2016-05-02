<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/04/2016
 * Time: 00:40
 */

namespace Itb\Controller;

use Itb\Model\User;
use Itb\Model\Student;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class LoginController
{

    public function logoutAction(Request $request, Application $app)
    {
        // remove 'user' element from SESSION array
        unset($_SESSION['user']);
        unset($_SESSION['role']);

        $argsArray = [
            'user' => ''
        ];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


        // redirect to index action
    }


    public function loginStudentAction(Request $request, Application $app)
    {
        $templateName = 'login';
        $action = 'processStudentLogin';
        $argsArray=['action'=>$action];
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function loginAdminAction(Request $request, Application $app)
    {
        $action = 'processAdminLogin';
        $templateName = 'login';
        $argsArray=['action'=>$action];
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function printName(Request $request, Application $app, $username)
    {
        echo "$username";
        $argArray = ['user' => $username];
        $templateName = 'loginSuccess';
        return $app['twig']->render($templateName . '.html.twig', $argArray);
    }

    public function addUserForm(Request $request, Application $app)
    {
        $templateName = 'admin/addUser';
        return $app['twig']->render($templateName . '.html.twig', []);
    }


    public function addUser(Request $request, Application $app)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRole(User::ROLE_ADMIN);

        User::insert($user);

        $argsArray = ['user' => $user];
        $templateName = '/showSingleUser';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

//    public function addStudent(Request $request, Application $app)
//    {
//        $firstName = $request->get('firstName');
//        $surname=$request->get('surname');
//        $password=$request->get('password');
//        $attendsClass=$request->get('classType');
//
//        $ts =new \DateTime();
//        $t=$ts->getTimestamp();
//        $date = new \DateTime();
//        $student = new Student();
////        $student->setId(25);
//
//        $student->setSurname($surname);
//        $student->setFirstName($firstName);
//        $student->setPassword($password);
//        $student->setJoinDate($date->format('d-m-Y'));
//        $student->setLastGrading('');
//        $student->setCurrentGrade('9');
//        $student->setAvgGrade('');
//        $student->setAttendsClass($attendsClass);
//        $student->setTotalAttendedPercentage(22);
////        var_dump($student);
//
//        Student::insert($student);
//
//        $argsArray = ['student' => $student];
//        $templateName = 'admin/showSingleStudent';
//        return $app['twig']->render($templateName . '.html.twig', $argsArray);
//
//    }


    public function processStudentLogin(Request $request, Application $app)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        // default is bad login
        $isLoggedIn = false;

        $studentLogin = $this->canFindMatchingUsernameAndPassword($username, $password);

        // action depending on login success
        if ($studentLogin) {

            // User::set
                $_SESSION['role']='user';

            Student::getOneByUsername($username);
            // STORE login status SESSION
            $_SESSION['user'] = $username;

            $argsArray = ['user' => $username, 'pass' =>$password];
            $templateName = 'student/studentIndex';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);

            //     require_once __DIR__ . '/../templates/loginSuccess.php';
        } else {
            $argsArray = ['user' => $username];
            $templateName = 'loginFail';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = Student::getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        // return whether or not hash of input password matches stored hash
        return password_verify($password, $hashedStoredPassword);
    }
    public function processAdminLoginAction(Request $request, Application $app)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        // default is bad login
        $isLoggedIn = false;

        // search for user with username in repository
        $isLoggedIn = $this->canFindMatchingUsernameAndPassword($username, $password);

        //  $user =  User::getOneByUsername($username);
        // action depending on login success
        if ($isLoggedIn) {
            //            User::set
//
            $isAdmin = $this->canFindMatchingAdminUsernameAndPassword($username, $password);
            if ($isAdmin) {
                $_SESSION['role']='admin';
            } else {
                $_SESSION['role']='user';
            }
            User::getOneByUsername($username);
            // STORE login status SESSION
            $_SESSION['user'] = $username;

            $argsArray = ['user' => $username, 'pass' =>$password];
            $templateName = 'loginSuccess';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);

       //     require_once __DIR__ . '/../templates/loginSuccess.php';
        } else {
            $argsArray = ['user' => $username];
            $templateName = 'loginFail';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

    public function isLoggedInFromSession()
    {
        $isAdminLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if (isset($_SESSION['user'])&& $_SESSION['role']=='admin') {
            $isAdminLoggedIn = true;
        }

        return $isAdminLoggedIn;
    }

    public function usernameFromSession()
    {
        $username = '';

        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        return $username;
    }

    public static function canFindMatchingAdminUsernameAndPassword($username, $password)
    {
        $user = User::getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();
        $isAdmin= $user->getRole();
        echo"$isAdmin";
        // return whether or not hash of input password matches stored hash
        return $isAdmin;
    }


}
