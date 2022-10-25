<?php

namespace App\Nba;

class SkinsData
{
    /**
     * @var SelectedTeamRecord[]
     */
    private array $selectedTeamRecords;

    /**
     * @param TeamRecord[] $teamRecords
     */
    public function __construct(array $teamRecords)
    {
        foreach ($teamRecords as $teamRecord) {
            $selectedTeamRecord = SelectedTeamRecord::makeSelection($teamRecord);
            if ($selectedTeamRecord)
                $this->selectedTeamRecords[] = $selectedTeamRecord;
        }
    }

    /**
     * @return SelectedTeamRecord[]
     */
    public function getSelectedTeamRecords(): array
    {
        return $this->selectedTeamRecords;
    }

    public function getTotalSkinsFor(string $drafter): int
    {
        return array_reduce($this->selectedTeamRecords, function(int $carry, SelectedTeamRecord $selectedTeamRecord) use ($drafter) {
            if ($selectedTeamRecord->getDrafter()->getName() === $drafter) {
                return $carry + $selectedTeamRecord->getPoints();
            }

            return $carry;
        }, 0);
    }
}