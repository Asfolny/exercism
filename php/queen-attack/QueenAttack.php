<?php declare(strict_types=1);
global $grid;
$grid = [
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_'],
    ['_', '_', '_', '_', '_', '_', '_', '_']
];

function placeQueen(int $x, int $y): bool
{
    global $grid;
    if ($x < 0 || $y < 0)
        throw new InvalidArgumentException('The rank and file numbers must be positive.');
    // outside of grid
    if (!isset($grid[$x][$y]))
        throw new InvalidArgumentException('The position must be on a standard size chess board.');

    $grid[$x][$y] = 'Q';
    return true;
}

function canAttack(array $whiteQueen, array $blackQueen): bool
{
    global $grid;
    // Same column or same row
    if ($whiteQueen[0] === $blackQueen[0] || $whiteQueen[1] === $blackQueen[1]) {
        return true;
    }

    [$wx, $wy] = $whiteQueen;
    [$bx, $by] = $blackQueen;
    
    placeQueen($wx, $wy);
    placeQueen($bx, $by);

    // Diagonal checks
    if ($wx !== 0) {
        // We can go up
        $y = $wy-1;
        for($x = $wx-1; $x >= 0; $x--, $y--) {
            if (isset($grid[$x][$y]) && $grid[$x][$y] === "Q") {
                return true;
            }
        }

        $y = $wy+1;
        for($x = $wx-1; $x >= 0; $x--, $y++) {
            if (isset($grid[$x][$y]) && $grid[$x][$y] === "Q") {
                return true;
            }
        }
    }

    if ($wx !== 7) {
        // We can go down
        // We can go up
        $y = $wy-1;
        for($x = $wx+1; $x < 8; $x++, $y--) {
             var_dump("checking $x, $y");
            if (isset($grid[$x][$y]) && $grid[$x][$y] === "Q") {
                return true;
            }
        }

        $y = $wy+1;
        for($x = $wx+1; $x < 8; $x++, $y++) {
             var_dump("checking $x, $y");
            if (isset($grid[$x][$y]) && $grid[$x][$y] === "Q") {
                return true;
            }
        }
    }

    return false;
}
