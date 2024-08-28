<?php declare(strict_types=1);

class ResistorColorDuo
{
    public const COLOR_MAP = [
        'black',
        'brown',
        'red',
        'orange',
        'yellow',
        'green',
        'blue',
        'violet',
        'grey',
        'white'
    ];

    public function getColorsValue(array $colors): int
    {
        $values = [];

        for($i = 0; $i < 2; $i++) {
            $colorVal = array_search($colors[$i], self::COLOR_MAP);
            $values[] = $colorVal;
        }

        return (int)implode('', $values);
    }
}
