<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/homespace", name="app_home")
     */
    public function home(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    /**
     * @Route("/about-us", name="app_about")
     */
    public function about(): Response
    {
        return $this->render('pages/about.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
}
