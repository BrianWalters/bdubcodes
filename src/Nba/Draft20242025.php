<?php

namespace App\Nba;

class Draft20242025 implements DraftInterface
{
    private Drafter $adam;
    private Drafter $brian;
    private Drafter $eristeo;
    private Drafter $kenneth;
    private Drafter $sharkey;
    private Drafter $thomas;

    public function __construct()
    {
        $this->adam = new Drafter('Adam');
        $this->brian = new Drafter('Brian');
        $this->eristeo = new Drafter('Eristeo');
        $this->kenneth = new Drafter('Kenneth');
        $this->sharkey = new Drafter('Sharkey');
        $this->thomas = new Drafter('Thomas');
    }

    public function getSelections(): array
    {
        return [
            [$this->kenneth, 'Boston Celtics', 'WINS'],
            [$this->adam, 'Washington Wizards', 'LOSSES'],
            [$this->brian, 'Oklahoma City Thunder', 'WINS'],
            [$this->eristeo, 'Brooklyn Nets', 'LOSSES'],
            [$this->thomas, 'Portland Trail Blazers', 'LOSSES'],
            [$this->sharkey, 'Detroit Pistons', 'LOSSES'],
            [$this->sharkey, 'Minnesota Timberwolves', 'WINS'],
            [$this->thomas, 'Toronto Raptors', 'LOSSES'],
            [$this->eristeo, 'New York Knicks', 'WINS'],
            [$this->brian, 'Utah Jazz', 'LOSSES'],
            [$this->adam, 'Cleveland Cavaliers', 'WINS'],
            [$this->kenneth, 'San Antonio Spurs', 'LOSSES'],
            [$this->kenneth, 'Charlotte Hornets', 'LOSSES'],
            [$this->adam, 'Milwaukee Bucks', 'WINS'],
            [$this->brian, 'Chicago Bulls', 'LOSSES'],
            [$this->eristeo, 'Denver Nuggets', 'WINS'],
            [$this->thomas, 'Philadelphia 76ers', 'WINS'],
            [$this->sharkey, 'Dallas Mavericks', 'WINS'],
            [$this->sharkey, 'Indiana Pacers', 'WINS'],
            [$this->thomas, 'Phoenix Suns', 'WINS'],
            [$this->eristeo, 'Orlando Magic', 'WINS'],
            [$this->brian, 'Sacramento Kings', 'WINS'],
            [$this->adam, 'Memphis Grizzlies', 'WINS'],
            [$this->kenneth, 'New Orleans Pelicans', 'WINS'],
            [$this->kenneth, 'LA Clippers', 'WINS'],
            [$this->adam, 'Atlanta Hawks', 'WINS'],
            [$this->brian, 'Houston Rockets', 'WINS'],
            [$this->eristeo, 'Golden State Warriors', 'WINS'],
            [$this->thomas, 'Los Angeles Lakers', 'WINS'],
            [$this->sharkey, 'Miami Heat', 'WINS'],
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
            $this->kenneth,
            $this->sharkey,
            $this->thomas,
        ];
    }
}