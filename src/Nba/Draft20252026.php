<?php

namespace App\Nba;

class Draft20252026 implements DraftInterface
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
            [$this->eristeo, 'Utah Jazz', 'LOSSES'],
            [$this->sharkey, 'Oklahoma City Thunder', 'WINS'],
            [$this->adam, 'Brooklyn Nets', 'LOSSES'],
            [$this->brian, 'Washington Wizards', 'LOSSES'],
            [$this->thomas, 'Cleveland Cavaliers', 'WINS'],
            [$this->kenneth, 'Houston Rockets', 'WINS'],
            [$this->kenneth, 'Orlando Magic', 'WINS'],
            [$this->thomas, 'Denver Nuggets', 'WINS'],
            [$this->brian, 'Charlotte Hornets', 'LOSSES'],
            [$this->adam, 'New York Knicks', 'WINS'],
            [$this->sharkey, 'New Orleans Pelicans', 'LOSSES'],
            [$this->eristeo, 'Phoenix Suns', 'LOSSES'],
            [$this->eristeo, 'LA Clippers', 'WINS'],
            [$this->sharkey, 'Minnesota Timberwolves', 'WINS'],
            [$this->adam, 'Atlanta Hawks', 'WINS'],
            [$this->brian, 'Milwaukee Bucks', 'WINS'],
            [$this->thomas, 'Chicago Bulls', 'LOSSES'],
            [$this->kenneth, 'Portland Trail Blazers', 'LOSSES'],
            [$this->kenneth, 'Golden State Warriors', 'WINS'],
            [$this->thomas, 'Sacramento Kings', 'LOSSES'],
            [$this->brian, 'Detroit Pistons', 'WINS'],
            [$this->adam, 'Los Angeles Lakers', 'WINS'],
            [$this->sharkey, 'Miami Heat', 'LOSSES'],
            [$this->eristeo, 'Indiana Pacers', 'WINS'],
            [$this->eristeo, 'San Antonio Spurs', 'WINS'],
            [$this->sharkey, 'Philadelphia 76ers', 'WINS'],
            [$this->adam, 'Boston Celtics', 'WINS'],
            [$this->brian, 'Toronto Raptors', 'LOSSES'],
            [$this->thomas, 'Dallas Mavericks', 'WINS'],
            [$this->kenneth, 'Memphis Grizzlies', 'WINS'],
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