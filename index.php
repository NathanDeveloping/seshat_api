<?php

require "vendor/autoload.php";
use slim\Slim;
use seshatapi\controllers\DataController;

$app = new Slim();

$app->get('/', function() {
});

$app->get('/api/labels)', function(){
    $c = new DataController();
    $c->getLabels();
});

$app->run();