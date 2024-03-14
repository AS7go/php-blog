<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!111111111111111");
    return $response;
});

$app->get('/about', function (Request $request, Response $response, $args) {
    $response->getBody()->write("about 222");
    return $response;
});

$app->run();