<?php declare(strict_types=1);

class SpiralMatrix
{
    public function draw(int $n): array
    {
        $matrix = array_fill(0, $n, array_fill(0, $n, 0));

        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];
        $dir = 0;

        $row = 0;
        $col = 0;
        
        for ($num = 1; $num <= $n * $n; $num++) {
            $matrix[$row][$col] = $num;
            
            $nextRow = $row + $directions[$dir][0];
            $nextCol = $col + $directions[$dir][1];
            
            if ($nextRow >= 0 && $nextRow < $n && $nextCol >= 0 && $nextCol < $n && $matrix[$nextRow]                            [$nextCol] == 0) {
                $row = $nextRow;
                $col = $nextCol;
            } else {
                $dir = ($dir + 1) % 4;
                $row += $directions[$dir][0];
                $col += $directions[$dir][1];
            }
        }
        
        return $matrix;
    }
}