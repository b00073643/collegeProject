<?php
// load classes
// ---------------------------------------
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'michael');
define('DB_PASS', 'password');
define('DB_NAME', 'itb');

$templatesPath = __DIR__.'/../templates';
$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path'=>$templatesPath
]);