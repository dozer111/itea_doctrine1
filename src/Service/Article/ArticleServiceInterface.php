<?php


namespace App\Service\Article;

use App\Collection\ArticleModelCollection;
use App\Model\Article;

interface ArticleServiceInterface
{
    public function findArticle(array $where):?Article;
    public function findArticles():?ArticleModelCollection;
}
