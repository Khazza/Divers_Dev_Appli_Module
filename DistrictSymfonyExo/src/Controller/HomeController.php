<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function votreMethode(CategorieRepository $categorieRepo, PlatRepository $platRepo)
    {
        $categories = $categorieRepo->findRandomCategories();
        $plats = $platRepo->findRandomPlats();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'plats' => $plats,
        ]);
    }

    
}
