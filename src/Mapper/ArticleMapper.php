<?php


namespace App\Mapper;

use App\Collection\ArticleModelCollection;
use App\Entity\Article as ArticleEntity;
use App\Model\Article;
use App\Model\Category;

final class ArticleMapper
{
    private function __construct()
    {
    }


    public static function getArticle(ArticleEntity $articleMysqlEntity):Article
    {
        $category = $articleMysqlEntity->getCategory();




        $article = new Article(
            $articleMysqlEntity->getId(),
            $articleMysqlEntity->getTitle(),
            new Category(
                $category->getId(),
                $category->getTitle(),
                $category->getSlug()
            ),
            $articleMysqlEntity->getSlug()
        );


        return $article;
    }
}
