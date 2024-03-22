<?php

use Blog\Database;
use Blog\Slim\TwigMiddleware;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Blog\Route\AboutPage;
use Blog\Route\BlogPage;
use Blog\Route\HomePage;
use Blog\Route\PostPage;
use DI\ContainerBuilder;
use DevCoder\DotEnv;

require __DIR__ . '/vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions('config/di.php');
(new DotEnv(__DIR__ . '/.env'))->load();

$container = $builder->build();

AppFactory::setContainer($container);

// Create app
$app = AppFactory::create();

$view = $container->get(Environment::class);
$app->add($container->get(TwigMiddleware::class));

$app->get('/', HomePage::class . ':execute');
$app->get('/about', AboutPage::class);
$app->get('/blog[/{page}]', BlogPage::class);
$app->get('/{url_key}', PostPage::class);

$app->run();
