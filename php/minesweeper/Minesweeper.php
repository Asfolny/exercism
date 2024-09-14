<?php declare(strict_types=1);

class Minesweeper
{
    public function __construct(private array $minefield) {}

    public function annotate(): array
    {
        if ($this->minefield === [] || $this->minefield === [""]) {
            // Would've loved to just return empty array as there's nothing we can do...
            // but these tests expect [""] for [""] input...
            return $this->minefield;
        }
        $fieldMatrix = [];        
        foreach($this->minefield as $i => $row) {
            foreach(str_split($row) as $j => $field) {
                $fieldMatrix[$i][$j] = $field;
            }
        }

        $annotated = [];
        foreach($fieldMatrix as $i => $row) {
            foreach($row as $j => $field) {
                if ($field === "*") {
                    $annotated[$i][$j] = $field;
                    continue;
                }

                $directions = [
                    [$i, $j+1],
                    [$i+1, $j+1],
                    [$i+1, $j],
                    [$i+1, $j-1],
                    [$i, $j-1],
                    [$i-1, $j-1],
                    [$i-1, $j],
                    [$i-1, $j+1],
                ];
                $bombCount = 0;
                foreach($directions as $direction) {
                    [$x, $y] = $direction;
                    $feld = $fieldMatrix[$x][$y] ?? null;
                    if ($feld === "*") {
                        $bombCount++;
                    }
                }

                if ($bombCount) {
                    $annotated[$i][$j] = (string)$bombCount;
                } else {
                    $annotated[$i][$j] = " ";
                }
            }
        }

        foreach($annotated as $i => $row) {
            $annotated[$i] = implode("", $row);
        }

        return $annotated;
    }
}
