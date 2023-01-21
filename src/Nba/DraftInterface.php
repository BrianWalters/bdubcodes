<?php

namespace App\Nba;

interface DraftInterface
{
    /**
     * @return Drafter[]
     */
    public function getDrafters(): array;

    public function getSelections(): array;
}