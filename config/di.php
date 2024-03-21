<?php

declare(strict_types=1);

use Blog\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function DI\get;

return [
    FilesystemLoader::class => autowire()
    ->constructorParameter('paths', 'templates'),

    Environment::class => \DI\autowire()
    ->constructorParameter('loader', get(FilesystemLoader::class)),

    Database::class => autowire()
    ->constructorParameter('dsn', getenv('DATABASE_DSN'))
    ->constructorParameter('username', getenv('DATABASE_USER'))
    ->constructorParameter('password', getenv('DATABASE_PASSWORD'))

];