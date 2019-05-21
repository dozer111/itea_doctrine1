<?php


namespace App\Collection;

use App\Model\Article;
use Traversable;

class ArticleModelCollection implements \IteratorAggregate
{
    private $articles;


    public function __construct(Article ...$articles)
    {
        $this->articles = $articles;
    }


    public function addArticle(Article $article):self
    {
        $this->articles[] = $article;
        return $this;
    }




    /**
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->articles);
    }
}
