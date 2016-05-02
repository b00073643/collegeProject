<?php
// autoloader& other setup
// ---------------------------------------
require_once __DIR__ . '/../app/setup.php';

$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/logout', 'Itb\Controller\LoginController::logoutAction');


//admin only features
$app->get('/login', 'Itb\Controller\LoginController::loginAdminAction');
$app->post('/processAdminLogin', 'Itb\Controller\LoginController::processAdminLoginAction');
$app->get('/userlist', 'Itb\Controller\MainController::listAction');
$app->post('/addUser', 'Itb\Controller\LoginController::addUser');
$app->get('/addUserForm', 'Itb\Controller\LoginController::addUserForm');
$app->get('/addStudentForm', 'Itb\Controller\AdminController::addStudentForm');
$app->post('/addStudent', 'Itb\Controller\StudentController::addStudent');
$app->post('/showSingleStudent', 'Itb\Controller\MainController::showSingleStudent');
$app->post('/addStudent', 'Itb\Controller\StudentController::addStudent');
$app->post('/deleteStudent', 'Itb\Controller\AdminController::deleteStudent');
$app->post('/markAttendance', 'Itb\Controller\AdminController::markAttendance');
$app->get('/percentAttendance', 'Itb\Controller\AttendanceController::getPercentageAttendance');
$app->post('/processAttendance', 'Itb\Controller\AttendanceController::processAttendance');
$app->get('/attendance', 'Itb\Controller\AdminController::attendance');
$app->get('/attendancePage', 'Itb\Controller\AttendanceController::attendancePage');
$app->get('/fillGrades', 'Itb\Controller\GradeController::fillGrades');
$app->get('/listPage', 'Itb\Controller\MainController::listPage');
$app->get('/add', 'Itb\Controller\MainController::addPage');
$app->get('/showStudent', 'Itb\Controller\MainController::showStudents');
$app->post('/updateGradeForm', 'Itb\Controller\GradeController::updateGradeForm');
$app->post('/updateGrade', 'Itb\Controller\GradeController::updateGrade');

//student related features
$app->get('/studentLogin', 'Itb\Controller\LoginController::loginStudentAction');
$app->post('/processStudentLogin', 'Itb\Controller\LoginController::processStudentLogin');
$app->get('/showSingleStudent', 'Itb\Controller\MainController::showSingleStudent');
$app->post('/syllabus', 'Itb\Controller\TechniqueController::syllabus');
$app->get('/gradingInfo', 'Itb\Controller\GradeController::showStudentGrade');
$app->get('/belts', 'Itb\Controller\TechniqueController::listBelts');


$app->error(function (\Exception $e, $code) use ($app) {

    $mainController = new \Itb\Controller\MainController();
    return $mainController->errorAction($app, $code);
});

$app->run();

?>

