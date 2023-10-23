<?php

namespace App\Nba;

class Draft20232024 implements DraftInterface
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
            [$this->kenneth, 'Washington Wizards', 'LOSSES'],
            [$this->brian, 'Milwaukee Bucks', 'WINS'],
            [$this->eristeo, 'Portland Trail Blazers', 'LOSSES'],
            [$this->adam, 'Boston Celtics', 'WINS'],
            [$this->thomas, 'Detroit Pistons', 'LOSSES'],
            [$this->sharkey, 'Denver Nuggets', 'WINS'],
            [$this->sharkey, 'San Antonio Spurs', 'LOSSES'],
            [$this->thomas, 'Phoenix Suns', 'WINS'],
            [$this->adam, 'Cleveland Cavaliers', 'WINS'],
            [$this->eristeo, 'Charlotte Hornets', 'LOSSES'],
            [$this->brian, 'Houston Rockets', 'LOSSES'],
            [$this->kenneth, 'Golden State Warriors', 'WINS'],
            [$this->kenneth, 'Utah Jazz', 'LOSSES'],
            [$this->brian, 'Los Angeles Lakers', 'WINS'],
            [$this->eristeo, 'Philadelphia 76ers', 'WINS'],
            [$this->adam, 'Indiana Pacers', 'WINS'],
            [$this->thomas, 'Toronto Raptors', 'LOSSES'],
            [$this->sharkey, 'LA Clippers', 'WINS'],
            [$this->sharkey, 'Miami Heat', 'WINS'],
            [$this->thomas, 'Oklahoma City Thunder', 'WINS'],
            [$this->adam, 'New York Knicks', 'WINS'],
            [$this->eristeo, 'Memphis Grizzlies', 'WINS'],
            [$this->brian, 'Brooklyn Nets', 'LOSSES'],
            [$this->kenneth, 'Sacramento Kings', 'WINS'],
            [$this->kenneth, 'Dallas Mavericks', 'WINS'],
            [$this->brian, 'Orlando Magic', 'LOSSES'],
            [$this->eristeo, 'Chicago Bulls', 'LOSSES'],
            [$this->adam, 'Atlanta Hawks', 'WINS'],
            [$this->thomas, 'New Orleans Pelicans', 'WINS'],
//            [$this->sharkey, 'Minnesota Timberwolves', 'WINS'],
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