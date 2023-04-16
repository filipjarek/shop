<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
    }

    #[Route('/category/{slug}', name: 'app_category', methods: ['GET'])]
    public function index(string $slug): Response
    {
        $category = $this->categoryRepository->findOneBySlug($slug);

        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }
}
