<?php declare(strict_types=1);

enum Direction: string 
{
    case South = "south";
    case North = "north";
    case East = "east";
    case West = "west";
}

class RobotSimulator
{
    public const DIRECTION_NORTH = "north";
    public const DIRECTION_SOUTH = "south";
    public const DIRECTION_EAST = "east";
    public const DIRECTION_WEST = "west";
    
    /**
    * @param int[] $position
    * @param string $direction 
    */
    public function __construct(public array $position, public string $direction) {}

    public function turnRight(): self
    {
        $this->direction = match(Direction::from($this->direction)) {
            Direction::South => Direction::West->value,
            Direction::North => Direction::East->value,
            Direction::East => Direction::South->value,
            Direction::West => Direction::North->value
        };
        return $this;
    }

    public function turnLeft(): self
    {
        $this->direction = match(Direction::from($this->direction)) {
            Direction::South => Direction::East->value,
            Direction::North => Direction::West->value,
            Direction::East => Direction::North->value,
            Direction::West => Direction::South->value
        };
        return $this;
    }

    public function advance(): self
    {
          $change = match(Direction::tryFrom($this->direction)) {
            Direction::South => [0, -1],
            Direction::North => [0, 1],
            Direction::East => [1, 0],
            Direction::West => [-1, 0]
        };

        $this->position = [
            $this->position[0] + $change[0],
            $this->position[1] + $change[1]
        ];
        return $this;
    }

    public function instructions(string $set): self
    {
        foreach(str_split($set) as $instruction) {
            switch($instruction) {
                case "L":
                    $this->turnLeft();
                    break;
                case "R":
                    $this->turnRight();
                    break;
                case "A":
                    $this->advance();
                    break;
                default:
                    throw new InvalidArgumentException("Unsupported instruction");
            }
        }

        return $this;
    }
}
