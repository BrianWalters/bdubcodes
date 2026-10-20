<?php

namespace App\Nba;

class Draft20262027 implements DraftInterface
{
    private Drafter $adam;
    private Drafter $brian;
    private Drafter $eristeo;

    public function __construct()
    {
        $this->adam = new Drafter('Adam');
        $this->brian = new Drafter('Brian');
        $this->eristeo = new Drafter('Eristeo');
    }

    public function getSelections(): array
    {
        return [
            [$this->adam, 'Oklahoma City Thunder', 'WINS'],
            [$this->brian, 'San Antonio Spurs', 'WINS'],
            [$this->eristeo, 'Sacramento Kings', 'LOSSES'],
            [$this->eristeo, 'Brooklyn Nets', 'LOSSES'],
            [$this->brian, 'LA Clippers', 'WINS'],
            [$this->adam, 'Denver Nuggets', 'WINS'],
            [$this->adam, 'Boston Celtics', 'WINS'],
            [$this->brian, 'Milwaukee Bucks', 'LOSSES'],
            [$this->eristeo, 'New Orleans Pelicans', 'LOSSES'],
            [$this->eristeo, 'Chicago Bulls', 'LOSSES'],
            [$this->brian, 'New York Knicks', 'WINS'],
            [$this->adam, 'Philadelphia 76ers', 'WINS'],
            [$this->adam, 'Houston Rockets', 'WINS'],
            [$this->brian, 'Dallas Mavericks', 'LOSSES'],
            [$this->eristeo, 'Memphis Grizzlies', 'LOSSES'],
            [$this->eristeo, 'Detroit Pistons', 'WINS'],
            [$this->brian, 'Indiana Pacers', 'WINS'],
            [$this->adam, 'Toronto Raptors', 'WINS'],
            [$this->adam, 'Minnesota Timberwolves', 'WINS'],
            [$this->brian, 'Washington Wizards', 'LOSSES'],
            [$this->eristeo, 'Cleveland Cavaliers', 'WINS'],
            [$this->eristeo, 'Los Angeles Lakers', 'WINS'],
            [$this->brian, 'Golden State Warriors', 'LOSSES'],
            [$this->adam, 'Miami Heat', 'WINS'],
            [$this->adam, 'Phoenix Suns', 'LOSSES'],
            [$this->brian, 'Atlanta Hawks', 'WINS'],
            [$this->eristeo, 'Utah Jazz', 'LOSSES'],
            [$this->eristeo, 'Charlotte Hornets', 'LOSSES'],
            [$this->brian, 'Orlando Magic', 'LOSSES'],
            [$this->adam, 'Portland Trail Blazers', 'LOSSES'],
        ];
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
        ];
    }
}