<?php


namespace App\Controller;

use App\Service\Category\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{

    /**
     * @Route("/",name="home")
     */
    public function index(CategoryServiceInterface $categoryService):Response
    {
        $categories = $categoryService->getCategories();
        

        
        return $this->render(
            'site/index.html.twig',
            [
                'categories'    => $categories
            ]
        );
    }
}
