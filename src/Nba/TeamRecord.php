<?php

namespace App\Nba;

class TeamRecord
{
    public function __construct(private string $name, private int $wins, private int $losses)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWins(): int
    {
        return $this->wins;
    }

    public function getLosses(): int
    {
        return $this->losses;
    }


}