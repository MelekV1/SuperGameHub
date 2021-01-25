<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GameRepository;
use App\Entity\Game;

class GamesController extends AbstractController
{
    /**
     * @Route("/games", name="app_games")
     */
    public function index(GameRepository $gameRepository):Response
    {
        $Games = $gameRepository->findAll();

        return $this->render('games/index.html.twig',
        compact('Games')
        );
    }
    /**
     * @Route("/games/{id<[0-9]+>}", name="app_game_show")
     */
    public function show(Game $pin):Response
    {
        return $this->render('games/show.html.twig',
        compact('pin')
        );
    }
}

