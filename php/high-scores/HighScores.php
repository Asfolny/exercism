<?php declare(strict_types=1);

class HighScores
{
    public function __construct(public readonly array $scores = [])
    {
        $this->latest = end($scores);
        rsort($scores);
        $this->personalBest = current($scores);
        $this->personalTopThree = array_slice($scores, 0, 3);
    }
}
