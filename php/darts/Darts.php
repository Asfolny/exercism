<?php declare(strict_types=1);

class Darts
{
    public int $score;

    public function __construct(float $xAxis, float $yAxis)
    {
        $left = $xAxis**2 + $yAxis**2;
        $this->score = match (true) {
            $left <= 1**2 => 10,
            $left <= 5**2 => 5,
            $left <= 10**2 => 1,
            default => 0
        };
    }
}
