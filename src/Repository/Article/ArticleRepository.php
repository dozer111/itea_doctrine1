<?php

namespace App\Repository\Article;

use App\Collection\ArticleModelCollection;
use App\DTO\DummyDTO;
use App\Entity\Article;
use App\Mapper\ArticleMapper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository implements ArticleRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }




    public function findOne(DummyDTO $dto): ?Article
    {
        if (!isset($dto->id)) {
            //@TODO throw some error
        }

        $article = $this->createQueryBuilder('a')
            ->where('a.id=:id')
            ->setParameter('id', $dto->id)
            ->getQuery()
            ->getOneOrNullResult();

        return $article;
    }


    public function findArticles():?ArticleModelCollection
    {
        $articleList = $this->createQueryBuilder('a')
            ->getQuery()
            ->getResult();

        $articleModelCollection = new ArticleModelCollection();
        foreach ($articleList as $articleEntity) {
            $articleModelCollection->addArticle(ArticleMapper::getArticle($articleEntity));
        }
        

        
        return $articleModelCollection;
    }
}
