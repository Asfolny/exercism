<?php declare(strict_types=1);

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $people): int
    {
        return $pizzas * (($people * 20) + 200);
    }

    public function calculateSauceRequirement(int $pizzas, int $can_volume): int
    {
        $sauce_per_pizza = 125;
        return (int)($pizzas * $sauce_per_pizza / $can_volume);
    }

    public function calculateCheeseCubeCoverage(int $dimension, float $thickness, float $diameter): int
    {
        return (int)(pow($dimension, 3) / ($thickness * pi() * $diameter));
    }

    public function calculateLeftOverSlices(int $pizzas, int $people): int
    {
        $slices = $pizzas * 8;
        return $slices % $people;
    }
}
