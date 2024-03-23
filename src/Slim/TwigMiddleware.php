<?php

declare(strict_types=1);

namespace Blog\Slim;

use Blog\Twig\AssetExtension;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Twig\Environment;

class TwigMiddleware implements MiddlewareInterface
{

    public function __construct(Environment $environment, AssetExtension $assetExtension)
    {
        $environment->addExtension ($assetExtension);
    }


    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}
