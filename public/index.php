<?php

require '../vendor/autoload.php';

require '../db/db.php';


$app = new \Slim\Slim();

$app->get('/', function () {
  echo 'Hello world!';
});

$app->get('/get_usernames', function () {
  // "Boilerplate" is the namespace in the db.php file
  $db = new Boilerplate\Database();
  $db->getUsernames();
});
// optional way of calling routes: Namespace\Class:FunctionName
$app->get('/names', 'Boilerplate\Database:getUsernames');

$app->run();
