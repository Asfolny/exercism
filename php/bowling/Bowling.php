<?php declare(strict_types=1);

class Game
{
    private array $frames = [];
    private int $currentFrame = 0;
    public function score(): int
    {
        if (count($this->frames) < 10)
            throw new Exception("A game is always 10 frames");
        if (count($this->frames[9]) < 3 && 
            ($this->frames[9][1] === 10 || array_sum($this->frames[9]) === 10)) {
                throw new Exception("Fill ball not used, MUST be used");
            }
        
        $score = 0;
        foreach($this->frames as $round => $frame) {
            // Last round and open frames
            if ($round === 9 || array_sum($frame) < 10) {
                $score += array_sum($frame);
                continue;
            }

            // Strike
            if ($frame[0] === 10) {
                echo "INSIDE OF STRIKE\n";
                $frameScore = 10;
                $nextFrame = $this->frames[$round+1];
                if (count($nextFrame) === 1) {
                    $frameScore += $nextFrame[0];
                    $frameScore += $this->frames[$round+2][0];
                } else {
                    $tmp = $nextFrame[0] + $nextFrame[1];
                    var_dump($tmp, $nextFrame);
                    $frameScore += $nextFrame[0] + $nextFrame[1];
                }
                var_dump($frameScore);
                $score += $frameScore;
                continue;
            }

            // Spare
            $frameScore = 10;
            $frameScore += $this->frames[$round+1][0];
            $score += $frameScore;
            continue;
        }
        return $score;
    }

    public function roll(int $pins): void
    {
        // Roll failstates
        if ($this->currentFrame > 9)
            throw new Exception("Game only goes for 10 rounds!");
        if ($pins < 0)
            throw new Exception("Pins knocked over cannot be negative!");
        if ($pins > 10)
            throw new Exception("There are only 10 pins, what do you mean you scored higher?");

        $this->frames[$this->currentFrame][] = $pins;

        if ($this->currentFrame === 9) {
            if (count($this->frames[9]) === 3) {
                if (array_sum($this->frames[9]) - $pins < 10) {
                    throw new InvalidArgumentException("Fill ball not allowed!");
                }

                if (array_sum($this->frames[9]) > 20 && 
                   !($this->frames[9][0] === 10 && $this->frames[9][1] === 10)) {
                    throw new Exception("Cannot score more than 20 without 2 strikes");
                   }
                // Fill ball is valid, and we're done
                $this->currentFrame++;
                return;
            }
            return;
        }

        if (array_sum($this->frames[$this->currentFrame]) > 10) {
            throw new Exception("Only the last frame can have more than 10 pins in it");
        }

        if ($pins === 10 || count($this->frames[$this->currentFrame]) === 2) {
            $this->currentFrame++;
            return;
        }
    }
}
