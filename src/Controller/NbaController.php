<?php

namespace App\Controller;

use App\Nba\Draft;
use App\Nba\NbaData;
use App\Nba\SelectedTeamRecord;
use App\Nba\SkinsData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbaController extends AbstractController
{
    #[Route('/nba', name: 'nba')]
    public function nba(NbaData $nbaData): Response
    {
        $data = $nbaData->getTeamRecords();
        $teamRecords = $data['teamRecords'];
        $dataTime = $data['time'];
        $selections = new Draft();

        return $this->render('pages/nba.html.twig', [
            'skinsData' => new SkinsData($teamRecords),
            'selections' => $selections->getSelections(),
            'drafters' => $selections->getDrafters(),
            'dataTime' => $dataTime,
        ]);
    }
}