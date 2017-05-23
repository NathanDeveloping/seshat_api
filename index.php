<?php

require "vendor/autoload.php";
use seshatapi\controllers\DataController;
use Slim\Slim;

$app = new Slim();

$app->get('/', function() {
});

$app->get('/api/labels)', function(){
    $c = new DataController();
    $c->getLabels();
});

$app->run();