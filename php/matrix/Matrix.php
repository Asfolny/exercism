<?php declare(strict_types=1);

class Matrix
{
    private array $matrix;
    
    public function __construct(string $matrix)
    {
        $rows = explode("\n", $matrix);
        $this->matrix = array_map(fn($row) => explode(" ", $row), $rows);
    }

    public function getRow(int $rowId): array
    {
        return $this->matrix[$rowId-1];
    }

    public function getColumn(int $columnId): array
    {
        $cols = [];
        foreach($this->matrix as $row) {
            $cols[] = $row[$columnId-1];
        }

        return $cols;
    }
}
