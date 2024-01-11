<?php

namespace MDH\Blog\Blog\Persistence;

use MDH\Blog\Blog\Model\Article;
use MDH\Blog\Core\Database\Database;

class ArticleStorageRepositoryInterface implements ArticleRepositoryInterface
{
    public function __construct(private Database $database)
    {
    }

    public function getArticleFromId(int $id): ?Article
    {
        $pdo = $this->database->getDB();
        $sth = $pdo->prepare("SELECT * FROM article WHERE  id = ?");
        $sth->execute([$id]);
        $sth->setFetchMode(\PDO::FETCH_CLASS, Article::class);
        $article = $sth->fetch();
        if (!$article) {
            return null;
        }

        return  $article;
    }

    public function getArticles()
    {
        // TODO: Implement getArticles() method.
    }
}