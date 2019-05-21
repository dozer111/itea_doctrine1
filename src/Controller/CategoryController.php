<?php


namespace App\Controller;

use App\Service\Article\ArticleServiceInterface;
use App\Service\Category\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    /**
     * @Route(
     *     "category/show/{id}",
     *     name="get_category_by_id",
     *     requirements={"id"="\d+"}
     * )
     * @param CategoryServiceInterface $categoryService
     * @param int $id
     * @return Response
     */
    public function showCategoryById(CategoryServiceInterface $categoryService, int $id):Response
    {
        $category = $categoryService->getCategory(['id' => $id]);

        return $this->render(
            'category/showCategoryById.html.twig',
            [
                'category'  => $category
            ]
        );
    }



    /**
     * @Route(
     *     "category/{slug}",
     *     name="get_category_by_slug",
     *     requirements={"slug"="[\w_-]+"}
     * )
     * @param CategoryServiceInterface $categoryService
     * @param string $slug
     * @return Response
     */
    public function showCategoryBySlug(CategoryServiceInterface $categoryService, string $slug):Response
    {
        $category = $categoryService->getCategory(['slug' => $slug]);
        return $this->render(
            'category/showCategoryById.html.twig',
            [
                'category'  => $category
            ]
        );
    }
}
