<?php declare(strict_types=1);

class ProgramWindow
{
    public $x;
    public $y;
    public $width;
    public $height;
    
    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->width = 800;
        $this->height = 600;
    }

    public function resize(Size $newSize): void
    {
        $this->width = $newSize->width;
        $this->height = $newSize->height;
    }

    public function move(Position $newPosition): void
    {
        $this->x = $newPosition->x;
        $this->y = $newPosition->y;
    }
}
