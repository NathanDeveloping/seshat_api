<?php

require "vendor/autoload.php";
use seshatapi\controllers\DataController;
use Slim\Slim;

$app = new Slim();

$app->get('/', function() {
    echo "Seshat API v1 <br />";
    echo "Labels : /api/labels <br />\"";
});

$app->get('/api/labels', function() {
    $c = new DataController();
    $c->getLabels();
});

$app->run();