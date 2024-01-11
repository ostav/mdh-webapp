<?php

namespace MDH\Blog\Blog\Persistence;

use MDH\Blog\Core\Database\AbstractMapper;

interface ArticleRepositoryInterface
{
    public function getArticleFromId(int $id);

    public function getArticles();
}