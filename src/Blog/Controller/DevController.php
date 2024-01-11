<?php

namespace MDH\Blog\Blog\Controller;

use MDH\Blog\Blog\Model\Article;
use MDH\Blog\Blog\Persistence\ArticleRepositoryInterface;
use MDH\Blog\Core\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DevController extends AbstractController
{
    private ArticleRepositoryInterface $repository;
    public function __construct(ArticleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(): ResponseInterface
    {
        return $this->render('index.html.twig', [
            'title' => 'home'
        ]);
    }
    public function article(ServerRequestInterface $request, array $args): ResponseInterface
    {
        /** @var Article $article */
        $article = $this->repository->getArticleFromId($args['id']);

       return $this->render('index.html.twig', [
           'title' => $article->getTitle()
       ]);
    }
    public function admin(ServerRequestInterface $request, array $args): ResponseInterface
    {
       return $this->render('@admin/index.html.twig');
    }

}