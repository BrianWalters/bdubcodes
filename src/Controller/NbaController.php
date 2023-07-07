<?php

namespace App\Controller;

use App\Nba\Draft20222023;
use App\Nba\NbaData;
use App\Nba\SkinsData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbaController extends AbstractController
{
    #[Route('/nba', name: 'nba')]
    public function nba(): Response
    {
        return $this->redirectToRoute('nba-2022-2023');
    }

    #[Route('/nba/2022-2023', name: 'nba-2022-2023')]
    public function nba20222023(NbaData $nbaData): Response
    {
        $draft = new Draft20222023();
        $teamRecords = $nbaData->get2022023SeasonData();
        $skinData = new SkinsData($teamRecords, $draft);

        return $this->render('pages/nba.html.twig', [
            'skinsData' => $skinData,
            'selections' => $draft->getSelections(),
            'drafters' => $draft->getDrafters(),
            'updatedAt' => null,
        ]);
    }
}