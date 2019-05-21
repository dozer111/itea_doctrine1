<?php


namespace App\Repository\Category;

use App\DTO\DummyDTO;
use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function getCategory(DummyDTO $dto):Category;
    public function getCategories();
}
