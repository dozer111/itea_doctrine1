<?php


namespace App\Repository\Article;

use App\Collection\ArticleModelCollection;
use App\DTO\DummyDTO;
use App\Entity\Article;

interface ArticleRepositoryInterface
{
    public function findOne(DummyDTO $dto):?Article;
    public function findArticles():?ArticleModelCollection;
}
