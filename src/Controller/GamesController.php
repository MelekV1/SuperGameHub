<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PinRepository;
use App\Entity\Pin;

class GamesController extends AbstractController
{
    /**
     * @Route("/games", name="app_games")
     */
    public function index(PinRepository $pinRepository):Response
    {
        $pins = $pinRepository->findAll();

        return $this->render('games/index.html.twig',
        compact('pins')
        );
    }
    /**
     * @Route("/games/{id<[0-9]+>}", name="app_game_show")
     */
    public function show(Pin $pin):Response
    {
        return $this->render('games/show.html.twig',
        compact('pin')
        );
    }

}
