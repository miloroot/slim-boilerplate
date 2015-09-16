<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
  echo 'Hello world!';
});

$app->get('/get_usernames', function () {
  echo 'get usernames';
});

$app->run();
