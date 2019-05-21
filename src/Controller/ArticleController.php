<?php


namespace App\Controller;

use App\Service\Article\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{


    /**
     * @Route(
     *     "/article/show/{id}",
     *     name="article_show_id",
     *     requirements={
                "id"="\d+"
     *     }
     * )
     *
     * @param ArticleServiceInterface $articleService
     * @param int $id
     * @return  Response
     */
    public function showById(ArticleServiceInterface $articleService, int $id):Response
    {
        $article = $articleService->findArticle(['id'   => $id]);


        if ($article === null) {
            throw $this->createNotFoundException();
        }


        return $this->render(
            'article/showId.html.twig',
            [
                'article'   => $article
            ]
        );
    }

    /**
     * @Route(
     *     "/articles",
     *     name="all_articles"
     * )
     * @param ArticleServiceInterface $articleService
     * @return Response
     */
    public function showAll(ArticleServiceInterface $articleService):Response
    {
        $articles = $articleService->findArticles();


        return $this->render(
            'article/showAll.html.twig',
            [
                'articles'  => $articles,
            ]
        );
    }
}
