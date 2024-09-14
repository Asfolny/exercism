<?php declare(strict_types=1);

class Sublist
{
    public function compare(array $listOne, array $listTwo): string
    {
        if ($listOne === $listTwo)
            return "EQUAL";
        if (empty($listOne))
            return "SUBLIST";
        if (empty($listTwo))
            return "SUPERLIST";

        if (count($listOne) < count($listTwo)) {
            $windowSize = count($listOne);
            for($i = 0; $i <= count($listTwo)-$windowSize; $i++) {
                $slice = array_slice($listTwo, $i, $windowSize);
                if ($listOne === array_slice($listTwo, $i, $windowSize))
                    return "SUBLIST";
            }
        }

        if (count($listTwo) < count($listOne)) {
            $windowSize = count($listTwo);
            for($i = 0; $i <= count($listOne)-$windowSize; $i++) {
                $slice = array_slice($listOne, $i, $windowSize);
                if ($listTwo === array_slice($listOne, $i, $windowSize))
                    return "SUPERLIST";
            }
        }

        return "UNEQUAL";
    }
}
