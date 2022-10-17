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
            [$this->eristeo, 'Houston Rockets', 'LOSSES'],
            [$this->brian, 'Oklahoma City Thunder', 'LOSSES'],
            [$this->thomas, 'Detroit Pistons', 'LOSSES'],
            [$this->thomas, 'Orlando Magic', 'LOSSES'],
            [$this->brian, 'Utah Jazz', 'LOSSES'],
            [$this->eristeo, 'Indiana Pacers', 'LOSSES'],
            [$this->kenneth, 'Phoenix Suns', 'WINS'],
            [$this->adam, 'Golden State Warriors', 'WINS'],
            [$this->adam, 'Milwaukee Bucks', 'WINS'],
            [$this->kenneth, 'Memphis Grizzlies', 'WINS'],
            [$this->eristeo, 'Boston Celtics', 'WINS'],
            [$this->brian, 'Charlotte Hornets', 'LOSSES'],
            [$this->thomas, 'Sacramento Kings', 'LOSSES'],
            [$this->thomas, 'Miami Heat', 'WINS'],
            [$this->brian, 'Philadelphia 76ers', 'WINS'],
            [$this->eristeo, 'LA Clippers', 'WINS'],
            [$this->kenneth, 'Cleveland Cavaliers', 'WINS'],
            [$this->adam, 'Washington Wizards', 'LOSSES'],
            [$this->adam, 'Toronto Raptors', 'WINS'],
            [$this->kenneth, 'Atlanta Hawks', 'WINS'],
            [$this->eristeo, 'Brooklyn Nets', 'WINS'],
            [$this->brian, 'Minnesota Timberwolves', 'WINS'],
            [$this->thomas, 'Dallas Mavericks', 'WINS'],
            [$this->thomas, 'Los Angeles Lakers', 'LOSSES'],
            [$this->brian, 'New Orleans Pelicans', 'WINS'],
            [$this->eristeo, 'New York Knicks', 'LOSSES'],
            [$this->kenneth, 'Chicago Bulls', 'WINS'],
            [$this->adam, 'Portland Trail Blazers', 'LOSSES'],
        ];
    }
}