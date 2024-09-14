<?php declare(strict_types=1);

function prime(int $number)
{
    $pris = [];
    $i = 0;
    $start = 2;
    while ($i < $number) {
        foreach($pris as $pri) {
            if ($start % $pri === 0) {
                $start++;
                continue 2;
            }
        }

        $pris[] = $start;
        $i++;
        $start++;
        
    }

    return array_pop($pris);
}
