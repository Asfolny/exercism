<?php declare(strict_types=1);

class Position 
{
    public function __construct(
        public readonly int $y,
        public readonly int $x
    ) {}
}