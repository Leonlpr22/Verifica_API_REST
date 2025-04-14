<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/ClassiController.php';

$app = AppFactory::create();

//Alunni

$app->get('/classi/{classe_id}/alunni', "AlunniController:index");

$app->get('/alunni/{id}', "AlunniController:show");

$app->post('/classi/{classe_id}/alunni', "AlunniController:create");

$app->put('/classi/{id}/alunni', "AlunniController:update");
//Classi

$app->get('/classi', "ClassiController:index");

$app->get('/classi/{id}', "ClassiController:show");

$app->post('/classi', "ClassiController:create");

$app->put('/classi/{id}', "ClassiController:update");

$app->delete('/classi/{id}', "ClassiController:delete");




$app->run();

