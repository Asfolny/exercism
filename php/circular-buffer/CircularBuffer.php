<?php declare(strict_types=1);

class CircularBuffer
{
    public function __construct(
        public readonly int $size,
        public int $head = 0,
        public array $data = []
    ) {}

    public function read()
    {
        if (!isset($this->data[$this->head]))
            throw new BufferEmptyError('buffer is empty');

        $d = $this->data[$this->head];
        unset($this->data[$this->head]);
        $this->head = $this->head + 1 % $this->size;
        return $d;
    }

    public function write($item): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $p = $this->head + $i % $this->size;

            if (!isset($this->data[$p])) {
                $this->data[$p] = $item;
                return;
            }
        }

        throw new BufferFullError('buffer is full');
    }

    public function forceWrite($item): void
    {
        try {
            $this->write($item);
        } catch(BufferFullError) {
            $this->data = array_values($this->data);
            $this->head = 0;
            array_shift($this->data);
            $this->write($item);
        }
    }

    public function clear(): void
    {
        $this->data = [];
        $this->head = 0;
    }
}

class BufferFullError extends Exception
{
}

class BufferEmptyError extends Exception
{
}
