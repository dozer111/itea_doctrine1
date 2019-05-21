<?php


namespace App\Service\Category;

use App\Collection\CategoryCollection;
use App\Mapper\CategoryMapper;
use App\Model\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Service\AbstractService;

final class CategoryMysqlService extends AbstractService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
    }


    public function getCategory(array $where): ?Category
    {
        $this->dto->import($where);

        $categoryEntity = $this->categoryRepository->getCategory($this->dto);
        
        $categoryModel = CategoryMapper::getCategory($categoryEntity);

        return $categoryModel;
    }

    public function getCategories(): ?CategoryCollection
    {
        $categoryCollection = $this->categoryRepository->getCategories();
        

        
        return $categoryCollection;
    }
}
