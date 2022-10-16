<?php

namespace App\Nba;

class Selections
{
    private Drafter $adam;
    private Drafter $brian;
    private Drafter $eristeo;
    private Drafter $kenneth;
    private Drafter $thomas;

    public function __construct()
    {
        $this->adam = new Drafter('Adam');
        $this->brian = new Drafter('Brian');
        $this->eristeo = new Drafter('Eristeo');
        $this->kenneth = new Drafter('Kenneth');
        $this->thomas = new Drafter('Thomas');
    }

    /**
     * @return Drafter[]
     */
    public function getDrafters(): array
    {
        return [
            $this->adam,
            $this->brian,
            $this->eristeo,
            $this->kenneth,
            $this->thomas,
        ];
    }

    public function getSelections(): array
    {
        return [
            [$this->adam, 'San Antonio Spurs', 'LOSSES'],
            [$this->kenneth, 'Denver Nuggets', 'WINS'],
            [$this->kenneth, 'Houston Rockets', 'LOSSES'],
            [$this->brian, 'Oklahoma City Thunder', 'LOSSES'],
            [$this->thomas, 'Detroit Pistons', 'LOSSES'],
            [$this->thomas, 'Orlando Magic', 'LOSSES'],
            [$this->brian, 'Utah Jazz', 'LOSSES'],
            [$this->eristeo, 'Indianapolis Pacers', 'LOSSES'],
            [$this->kenneth, 'Phoenix Suns', 'WINS'],
            [$this->adam, 'Golden State Warriors', 'WINS'],
            [$this->adam, 'Milwaukee Bucks', 'WINS'],
            [$this->kenneth, 'Memphis Grizzlies', 'WINS'],
            [$this->eristeo, 'Boston Celtics', 'WINS'],
            [$this->brian, 'Charlotte Hornets', 'LOSSES'],
            [$this->thomas, 'Sacramento Kings', 'LOSSES'],
            [$this->thomas, 'Miami Heat', 'WINS'],
            [$this->brian, 'Philadelphia Sixers', 'WINS'],
            [$this->eristeo, 'LA Clippers', 'WINS'],
            [$this->kenneth, 'Cleveland Cavaliers', 'WINS'],
        ];
    }
}