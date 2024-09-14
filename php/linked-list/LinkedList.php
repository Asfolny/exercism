<?php declare(strict_types=1);

class LinkedList
{
    public function __construct(
        private array $nodes = []
    ) {}

    public function push(mixed $value): void
    {
        array_push($this->nodes, $value);
    }

    public function unshift(mixed $value): void
    {
        array_unshift($this->nodes, $value);
    }

    public function pop(): mixed
    {
        return array_pop($this->nodes);
    }

    public function shift(): mixed
    {
        return array_shift($this->nodes);
    }
}
