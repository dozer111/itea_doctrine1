<?php


namespace App\Collection;

use App\Model\Category;
use Traversable;

class CategoryCollection implements \IteratorAggregate
{
    private $categories;


    public function __construct(Category ...$categories)
    {
        $this->categories = $categories;
    }


    public function addCategory(Category $category):self
    {
        $this->categories[] = $category;
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
        return new \ArrayIterator($this->categories);
    }
}
