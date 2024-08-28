<?php declare(strict_types=1);

class Size 
{
    public function __construct(
        public readonly int $height,
        public readonly int $width
    ) {}
}