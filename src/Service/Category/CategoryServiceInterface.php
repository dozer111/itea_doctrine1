<?php


namespace App\Service\Category;

use App\Collection\CategoryCollection;
use App\Model\Category;

interface CategoryServiceInterface
{
    public function getCategory(array $where):?Category;
    public function getCategories():?CategoryCollection;
}
