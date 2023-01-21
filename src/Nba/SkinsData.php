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
    public function __construct(array $teamRecords, private DraftInterface $draft)
    {
        foreach ($teamRecords as $teamRecord) {
            $selectedTeamRecord = SelectedTeamRecord::makeSelection($teamRecord, $this->draft);
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

    /**
     * @return SelectedTeamRecord[]
     */
    public function getSortedSelectedTeamRecord(): array
    {
        $teams = $this->getSelectedTeamRecords();
        usort($teams, function(SelectedTeamRecord $selectedTeamRecordA, SelectedTeamRecord $selectedTeamRecordB) {
            return $selectedTeamRecordB->getPoints() - $selectedTeamRecordA->getPoints();
        });

        return $teams;
    }

    public function getTotalSkinsFor(string $drafterName): int
    {
        return array_reduce($this->selectedTeamRecords, function(int $carry, SelectedTeamRecord $selectedTeamRecord) use ($drafterName) {
            if ($selectedTeamRecord->getDrafter()->getName() === $drafterName) {
                return $carry + $selectedTeamRecord->getPoints();
            }

            return $carry;
        }, 0);
    }

    public function getSortedSkinsForAllDrafters(): array
    {
        $drafterToSkin = [];
        foreach ($this->draft->getDrafters() as $drafter) {
            $drafterToSkin[$drafter->getName()] = $this->getTotalSkinsFor($drafter->getName());
        }
        uasort($drafterToSkin, fn($a, $b) => $b - $a);
        return $drafterToSkin;
    }

    public function getMostValuableTeamForDrafter(string $drafterName): SelectedTeamRecord
    {
        return array_reduce($this->selectedTeamRecords, function(?SelectedTeamRecord $carry, SelectedTeamRecord $selectedTeamRecord) use ($drafterName) {
            if ($selectedTeamRecord->getDrafter()->getName() === $drafterName) {
                if (!$carry) {
                    return $selectedTeamRecord;
                }

                if ($selectedTeamRecord->getPoints() > $carry->getPoints()) {
                    return $selectedTeamRecord;
                }
            }

            return $carry;
        }, null);
    }

    public function getOverallPickNumberForTeam(string $teamName): int
    {
        foreach ($this->draft->getSelections() as $index => $selection) {
            if ($selection[1] === $teamName) {
                return $index + 1;
            }
        }

        return 420;
    }
}