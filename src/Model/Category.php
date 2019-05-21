<?php


namespace App\Model;

use App\Collection\ArticleModelCollection;

class Category
{
    private $id;
    private $title;
    private $slug;
    private $article;
    /**
     * Category constructor.
     * @param int $id
     * @param string $title
     * @param string $slug
     */
    public function __construct(int $id, string $title, string $slug, ArticleModelCollection $articles = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->article = $articles;
    }


    public function getArticle():?ArticleModelCollection
    {
        return $this->article;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getTitle():string
    {
        return $this->title;
    }


    public function getSlug():string
    {
        return $this->slug;
    }
}
