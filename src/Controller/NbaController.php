<?php

namespace App\Controller;

use App\Nba\Drafter;
use App\Nba\NbaData;
use App\Nba\SelectedTeamRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbaController extends AbstractController
{
    #[Route('/nba', name: 'nba')]
    public function nba(NbaData $nbaData): Response
    {
        $teamRecords = $nbaData->getTeamRecords();

        $selectedTeamRecords = [];

        foreach ($teamRecords as $teamRecord) {
            $selectedTeamRecord = SelectedTeamRecord::makeSelection($teamRecord);
            if ($selectedTeamRecord)
                $selectedTeamRecords[] = $selectedTeamRecord;
        }

        return $this->render('pages/nba.html.twig', [
            'selectedTeamRecords' => $selectedTeamRecords,
        ]);
    }
}