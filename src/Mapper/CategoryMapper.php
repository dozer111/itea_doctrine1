<?php


namespace App\Mapper;

use App\Collection\ArticleModelCollection;
use App\Collection\CategoryCollection;
use App\Entity\Category;
use App\Model\Category as CategoryModel;

final class CategoryMapper
{
    private function __construct()
    {
    }


    public static function getCategory(Category $category):CategoryModel
    {

        # articleModelCollection

        $articles = $category->getArticle();
        $articleCollection = new ArticleModelCollection();
        foreach ($articles as $article) {
            $articleCollection->addArticle(ArticleMapper::getArticle($article));
        }



        return new CategoryModel(
            $category->getId(),
            $category->getTitle(),
            $category->getSlug(),
            $articleCollection
        );
    }


    public static function getCategories(Category ...$categories):CategoryCollection
    {
        $categoryModelCollection = new CategoryCollection();

        foreach ($categories as $category) {
            $categoryModel = new CategoryModel(
                $category->getId(),
                $category->getTitle(),
                $category->getSlug()
            );
            $categoryModelCollection->addCategory($categoryModel);
        }

        return $categoryModelCollection;
    }
}
