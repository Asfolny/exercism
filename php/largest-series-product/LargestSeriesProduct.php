<?php declare(strict_types=1);

class Series
{
    public function __construct(public readonly string $input) {
        foreach(str_split($input) as $char) {
            if (!is_numeric($char)) {
                throw new InvalidArgumentException("input contians non-numeric");
            }
        }
    }

    public function largestProduct(int $span): int
    {
        if ($span == 0) {
            return 1;
        }

        if ($span > strlen($this->input) || $span < 0) {
            throw new InvalidArgumentException("requested project larger than input");
        }

        $max = 0;
        for($i = 0; $i < strlen($this->input)-1; $i++) {
            $tmp = 0;

            for($j = 0; $j < $span; $j++) {
                if ($j === 0) {
                    $tmp = (int)$this->input[$i];
                    continue;
                }

                $tmp *= (int)$this->input[$i+$j];
            }

            if ($max < $tmp) {
                $max = $tmp;
            }
        }

        return $max;
    }
}
