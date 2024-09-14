<?php declare(strict_types=1);

class Triangle
{
    public function __construct(private readonly float $a, private readonly float $b, private readonly float $c)
    {
        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new InvalidArgumentException("A triangle must have all 3 sides as positive length");
        }

        $sides = [$a, $b, $c];
        rsort($sides);
        $max = array_shift($sides);
        if ($max > array_sum($sides)) {
            throw new Exception();
        }
    }

    public function kind(): string
    {
        if ($this->a === $this->b && $this->b === $this->c) {
            return "equilateral";
        }

        return $this->a === $this->b || $this->a === $this->c || $this->b === $this->c ? "isosceles" : "scalene";
    }
}
