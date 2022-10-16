<?php

namespace App\Nba;

class Drafter
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}