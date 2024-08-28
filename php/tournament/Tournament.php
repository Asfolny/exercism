<?php declare(strict_types=1);

class Tournament
{
    public function __construct() {}

    public function tally(string $input): string
    {
        $teams = [];
        $matches = array_filter(explode("\n", $input));
        $freshResultSet = new ArrayObject([
            'MP' => 0,
            'W' => 0,
            'D' => 0,
            'L' => 0,
            'P' => 0
        ]);

        foreach($matches as $match) {
            $playout = explode(';', $match);

            if (count($playout) !== 3) {
                var_dump($matches);
                throw new \InvalidArgumentException('The format of a match MUST be "TEAM1;TEAM2;OUTCOME".');
            }
            $team1 = $playout[0];
            $team2 = $playout[1];
            $outcome = $playout[2];

            if (!isset($teams[$team1])) {
                $teams[$team1] = $freshResultSet->getArrayCopy();
            }
            
            if (!isset($teams[$team2])) {
                $teams[$team2] = $freshResultSet->getArrayCopy();
            }

            $teams[$team1]['MP']++;
            $teams[$team2]['MP']++;

            switch($outcome) {
                case 'win':
                    $teams[$team1]['W']++;
                    $teams[$team1]['P'] += 3;
                    $teams[$team2]['L']++;
                    break;
                
                case 'draw':
                    $teams[$team1]['D']++;
                    $teams[$team1]['P']++;
                    $teams[$team2]['D']++;
                    $teams[$team2]['P']++;
                    break;
                
                case 'loss':
                    $teams[$team1]['L']++;
                    $teams[$team2]['W']++;
                    $teams[$team2]['P'] += 3;
                    break;
                
                default:
                    throw new \UnexpectedValueException('OUTCOME of a match must be either "win", "draw" or "loss".');
            }
        }

        // sort alphabetically
        ksort($teams);
        //sort by points
        uasort($teams, fn ($a, $b) =>
            $a['P'] !== $b['P'] ?
                $a['P'] > $b['P'] ? -1 : 1
            : 0
        );
        
        $tallyString = "Team                           | MP |  W |  D |  L |  P\n";
        $nameLen = strlen("Team                           ");

        foreach($teams as $name => $stats) {
            // The fact this is needed s there's no definition for the output format is horrific frankly...
            $namePart = $name . str_repeat(" ", $nameLen - strlen($name));
            $tallyString .= "$namePart|  {$stats['MP']} |  {$stats['W']} |  {$stats['D']} |  {$stats['L']} |  {$stats['P']}\n";
        }

        return rtrim($tallyString);
    }
}
