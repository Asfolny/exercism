<?php declare(strict_types=1);

function recognize(array $input): string
{
    $shapes = [
        [
            " _ ",
            "| |",
            "|_|"
        ],
        [
            "   ",
            "  |",
            "  |"
        ],
        [
            " _ ",
            " _|",
            "|_ "
        ],
        [
            " _ ",
            " _|",
            " _|"
        ],
        [
            "   ",
            "|_|",
            "  |"
        ],
        [
            " _ ",
            "|_ ",
            " _|"
        ],
        [
            " _ ",
            "|_ ",
            "|_|"
        ],
        [
            " _ ",
            "  |",
            "  |",
        ],
        [
            " _ ",
            "|_|",
            "|_|",
        ],
        [
            " _ ",
            "|_|",
            " _|",
        ]
    ];
    $result = "";
    $runs = strlen($input[0]) / 3;

    for ($i = 0; $i < $runs; $i++) {
        // Sanity tests
        if (!isset(
            $input[0][$i*3], $input[0][$i*3+1], $input[0][$i*3+2],
            $input[1][$i*3], $input[1][$i*3+1], $input[1][$i*3+2],
            $input[2][$i*3], $input[2][$i*3+1], $input[2][$i*3+2],
            $input[3][$i*3], $input[3][$i*3+1], $input[3][$i*3+2]
        )) {
            var_dump($i);
            throw new InvalidArgumentException("invalid formatted input");
        }

        $currentShape = [
            "{$input[0][$i*3]}{$input[0][$i*3+1]}{$input[0][$i*3+2]}",
            "{$input[1][$i*3]}{$input[1][$i*3+1]}{$input[1][$i*3+2]}",
            "{$input[2][$i*3]}{$input[2][$i*3+1]}{$input[2][$i*3+2]}"
        ];
        $shape = array_search($currentShape, $shapes, true);
        if ($shape === false) {
            $shape = "?";
        }
        $result .= $shape;
    }

    if (count($input) > 4) {
        $result .= "," . recognize(array_slice($input, 4));
    }

    return $result;
}
