<?php

namespace App\Repository\Category;

use App\Collection\CategoryCollection;
use App\DTO\DummyDTO;
use App\Entity\Category;
use App\Mapper\CategoryMapper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryRepository[]    findAll()
 * @method CategoryRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }





    public function getCategory(DummyDTO $dto):Category
    {
        $categoryObject = null;


        if ($dto->slug) {
            $categoryObject =
                $this->createQueryBuilder('c')
                    ->where('c.slug=:slug')
                ->setParameter('slug', $dto->slug)->getQuery()
                    ->getOneOrNullResult();
        } elseif ($dto->id) {
            $categoryObject =
                $this->createQueryBuilder('c')
                    ->where('c.id=:id')
                    ->setParameter('id', $dto->id)
                    ->getQuery()
                    ->getOneOrNullResult();
        } else {
            //@TODO throw some error
        }



        return $categoryObject;
    }

    public function getCategories()
    {
        $categoryEntities =  $this->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        $categoryModelCollection = new CategoryCollection();
        foreach ($categoryEntities as $categoryEntity) {
            $categoryModelCollection->addCategory(CategoryMapper::getCategory($categoryEntity));
        }

        return $categoryModelCollection;
    }
}
