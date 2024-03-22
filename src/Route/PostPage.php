<?php

declare(strict_types=1);

namespace Blog\Route;

use Blog\PostMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig\Environment;

class PostPage
{
    private Environment $view;

    private PostMapper $postMapper;

    public function __construct(Environment $view, PostMapper $postMapper)
    {
        $this->view = $view;
        $this->postMapper = $postMapper;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args=[]): ResponseInterface
    {
        $post = $this->postMapper->getByUrlKey((string) $args['url_key']);

        if (empty($post)) {
            $body = $this->view->render('not-found.twig');
        } else {
            $body = $this->view->render('post.twig', [
                'post' => $post
            ]);
        }
        $response->getBody()->write($body);
        return $response;
    }


    // private Environment $view;

    // private PostMapper $postMapper;

    // public function __construct(Environment $view, PostMapper $postMapper)
    // {
    //     $this->view = $view;
    //     $this->postMapper = $postMapper;
    // }

    // public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    // {
    //     $page = isset($args['page']) ? (int) $args['page'] : 1;
    //     $limit = 2;

    //     $posts = $this->postMapper->getList($page, $limit, 'DESC');

    //     $totalCount = $this->postMapper->getTotalCount();
    //     $body = $this->view->render('blog.twig', [
    //         'posts' =>$posts,
    //         'pagination' => [
    //             'current' => $page,
    //             'paging' => ceil($totalCount / $limit),
    //         ],
    //     ]);
    //     $response->getBody()->write($body);
    //     return $response;
    // }
}
