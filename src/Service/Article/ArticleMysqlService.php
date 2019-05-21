<?php


namespace App\Service\Article;

use App\Collection\ArticleModelCollection;
use App\Mapper\ArticleMapper;
use App\Model\Article;
use App\Repository\Article\ArticleRepositoryInterface;
use App\Service\AbstractService;

final class ArticleMysqlService extends AbstractService implements ArticleServiceInterface
{
    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        parent::__construct();
        $this->articleRepository = $articleRepository;
    }


    public function findArticle(array $where): ?Article
    {
        $this->dto->import($where);

        $articleEntity = $this->articleRepository->findOne($this->dto);
        $articleModel = ArticleMapper::getArticle($articleEntity);


        return $articleModel;
    }

    public function findArticles(): ?ArticleModelCollection
    {
        $articleModelCollection = $this->articleRepository->findArticles();

        return $articleModelCollection;
    }
}
