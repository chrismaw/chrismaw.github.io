<?php

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set("America/New_York");

//Monolog
//$log = new Logger('name');
//$log->pushHandler(new StreamHandler('error.log', Logger::WARNING));
//$log->addWarning('Boohoo');

//Slim & Twig
$app = new \Slim\Slim(array(
        'view' => new \Slim\Views\Twig()
        ));

$view = $app->view();
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/', function() use($app){
    $app->render('home.twig');
})->name('home');

//$app->get('/', function() use($app){
//    $app->render('home.twig', ['success' => isset($_GET['success'])]);
//})->name('home');

$app->get('/welcome', function() use($app){
    $app->render('welcome.twig');
})->name('welcome');

$app->get('/donations', function() use($app){
    $app->render('donations.twig');
})->name('donations');

$app->get('/contact', function() use($app){
    $app->render('contact.twig');
})->name('contact');

$app->get('/links', function() use($app){
    $app->render('links.twig');
})->name('links');

$app->run();