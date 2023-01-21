<?php

namespace App\Nba;

class SelectedTeamRecord
{
    private string $skinsType;

    public function __construct(private TeamRecord $teamRecord, private Drafter $drafter, string $skinsType)
    {
        $validTypes = ['WINS', 'LOSSES'];
        if (!in_array($skinsType, $validTypes))
            throw new \Exception('Skins type must be WINS or LOSSES');

        $this->skinsType = $skinsType;
    }

    public static function makeSelection(TeamRecord $teamRecord, DraftInterface $draft): ?SelectedTeamRecord
    {
        foreach ($draft->getSelections() as $selection) {
            if ($selection[1] === $teamRecord->getName()) {
                return new SelectedTeamRecord(
                    $teamRecord,
                    $selection[0],
                    $selection[2]
                );
            }
        }

        return null;
    }

    public function getTeamRecord(): TeamRecord
    {
        return $this->teamRecord;
    }

    public function getDrafter(): Drafter
    {
        return $this->drafter;
    }

    public function getSkinsType(): string
    {
        return $this->skinsType;
    }

    public function getPoints(): int
    {
        if ($this->skinsType === 'LOSSES') {
            return $this->teamRecord->getLosses();
        }

        if ($this->skinsType === 'WINS') {
            return $this->teamRecord->getWins();
        }

        return 0;
    }
}