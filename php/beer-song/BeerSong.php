<?php declare(strict_types=1);

class BeerSong
{
    public function verse(int $number): string
    {
        $numMinOne = $number-1;
        return match($number) {
            1 => "1 bottle of beer on the wall, 1 bottle of beer.\nTake it down and pass it around, no more bottles of beer on the wall.\n",
            0 => "No more bottles of beer on the wall, no more bottles of beer.\nGo to the store and buy some more, 99 bottles of beer on the wall.",
            2 => "2 bottles of beer on the wall, 2 bottles of beer.\nTake one down and pass it around, 1 bottle of beer on the wall.\n",
            default => "$number bottles of beer on the wall, $number bottles of beer.\nTake one down and pass it around, {$numMinOne} bottles of beer on the wall.\n"
        };
    }

    public function verses(int $start, int $finish): string
    {
        $result = "";

        for ($i = $start; $i >= $finish; $i--) {
            $result .= $this->verse($i);
            if ($i !== $finish) {
                $result .= PHP_EOL;
            }
        }

        return $result;
    }

    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
}
