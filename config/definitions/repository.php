<?php

use MDH\Blog\Blog\Persistence\ArticleRepositoryInterface;
use MDH\Blog\Blog\Persistence\ArticleStorageRepositoryInterface;
use function DI\create;
use function DI\get;

// Di Container functions

return [
    ArticleRepositoryInterface::class => create(ArticleStorageRepositoryInterface::class)
        ->constructor(get('app.core.db'))
];