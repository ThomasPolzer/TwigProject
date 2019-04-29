<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use model\customers\customer\Customer;
//use database;

require '../vendor/autoload.php';
//require '../controller/MyTraits.php';
require '../model/customers/Customer.php';
require '../controller/controllers/HomeController.php';
require '../model/database/Teammembers.php';
require '../model/customer/Projects.php';

//require '../views/home.twig';
//include __DIR__ . '/home.twig';
//require_once '../vendor/idiorm/idiorm-master/idiorm.php';
//require '../vendor/paris/paris-master/paris.php';


//Datenbankverbindung herstellen
ORM::configure('mysql:host=localhost;dbname=testuser');
ORM::configure('username', 'testuser');
ORM::configure('password', 'testuser');

//Model::$short_table_names = true;
ORM::configure('logging', true);


$app = new \Slim\App;


// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../views');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};


//new \controller\controllers\HomeController($app);

$test = new \controller\home\HomeController($app);
$test->createHomeView();


require '../routes/myroutes.php';

// Run app
$app->run();








/*


$loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Hello {{ name }}! Sie haben die ID: {{ id }}! Die Margin betrug vorher {{ old }}, nun beträgt sie {{ new }}.',
]);
$twig = new \Twig\Environment($loader);




echo $twig->render('index', ['name' => 'TGT', 'id' => $myresult, 'old' => $oldmargin, 'new' => $newmargin]);*/