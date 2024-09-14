<?php declare(strict_types=1);

class ResistorColorTrio
{
    public const COLORS = [
        "black",
        "brown",
        "red",
        "orange",
        "yellow",
        "green",
        "blue",
        "violet",
        "grey",
        "white"
    ];

    public function label(array $colors): string
    {
        $values = [];

        for($i = 0; $i < 2; $i++) {
            $colorVal = array_search($colors[$i], self::COLORS);
            $values[] = $colorVal;
        }
        
        $multitude = array_search($colors[2], self::COLORS);
        $ohms = (int)implode('', $values);
        
        if ($multitude > 0) {
            $ohms *= 10 ** $multitude;
        }

        // Since there are 10 colors, there can be up to 4 of these divisions, white, white, white is 99 gigaohms, the highest possibility
        if ($ohms < 1_000) {
            return $ohms . " ohms";
        }
        $ohms /= 1_000;

        if ($ohms < 1_000) {
            return $ohms . " kiloohms";
        }
        $ohms /= 1_000;

        if ($ohms < 1_000) {
            return $ohms . " megaohms";
        }
        $ohms /= 1_000;

        return $ohms . " gigaohms";
    }
}
