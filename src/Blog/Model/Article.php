<?php

namespace MDH\Blog\Blog\Model;


use MDH\Blog\Blog\Persistence\ArticleRepositoryInterface;
use MDH\Blog\Core\Database\Attributes\Field;
use MDH\Blog\Core\Database\Attributes\Mapper;
use MDH\Blog\Core\Database\Attributes\Table;

#[Mapper(ArticleRepositoryInterface::class)]
#[Table(name:'article')]
class Article
{
    #[Field(name:'title')]
    public ?string $title = null;

    #[Field(name:'description')]
    public ?string $description = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}