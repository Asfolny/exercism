<?php declare(strict_types=1);

function pascalsTriangleRows(int|null $rowCount): array|int
{
    if ($rowCount < 0 || $rowCount === null) 
        return -1;

    $result = [];
    for ($i = 0; $i < $rowCount; $i++) {
        $rowLength = $i+1;
        
        for ($j = 0; $j < $rowLength; $j++) { 
            $c = ($result[$i-1][$j-1] ?? 0) + ($result[$i-1][$j] ?? 0);
            $result[$i][$j] = $c ?: 1;
        }
    }

    return $result;
}
