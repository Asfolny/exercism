<?php declare(strict_types=1);

class Clock
{
    private const MAX_MINUTES = 24 * 60;
    private int $minutes;

    public function __construct(int $hours, int $minutes = 0) {
        // Normalize hours here so we can not care later
        $hours %= 24;
        if ($hours < 0) {
            $hours += 24;
        }
        
        $this->minutes = $minutes;
        $this->minutes += $hours * 60;
        $this->_normalize();
    }

    public function __toString(): string
    {
        $hours = floor($this->minutes / 60);
        $minutes = $this->minutes - $hours * 60;
        return sprintf("%02d:%02d", $hours, $minutes);
    }

    public function add(int $minutes): self {
        $this->minutes += $minutes;
        $this->_normalize();
        return $this;
    }

    public function sub(int $minutes): self {
        $this->minutes -= $minutes;
        $this->_normalize();
        return $this;
    }

    private function _normalize(): void {
        $this->minutes %= self::MAX_MINUTES;
        if ($this->minutes < 0) {
            $this->minutes += self::MAX_MINUTES;
        }
    }
}
