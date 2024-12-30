import gleam/list
import gleam/string

pub type Robot {
  Robot(direction: Direction, position: Position)
}

pub type Direction {
  North
  East
  South
  West
}

pub type Position {
  Position(x: Int, y: Int)
}

pub fn create(direction: Direction, position: Position) -> Robot {
  Robot(direction, position)
}

pub fn move(
  direction: Direction,
  position: Position,
  instructions: String,
) -> Robot {
  let next_instructions = string.slice(instructions, at_index: 1, length: string.length(instructions) - 1)

  case string.first(instructions) {
    Error(_) -> create(direction, position)
    Ok(next) -> case next {
      "L" -> move(left(direction), position, next_instructions)
      "R" -> move(right(direction), position, next_instructions)
      "A" -> move(direction, advance(position, direction), next_instructions)
      _ -> create(direction, position)
    }
  }
}

fn left(direction: Direction) -> Direction {
  case direction {
    North -> West
    East -> North
    South -> East
    West -> South
  }
}

fn right(direction: Direction) -> Direction {
  case direction {
    North -> East
    East -> South
    South -> West
    West -> North
  }
}

fn advance(position: Position, direction: Direction) -> Position {
  case direction {
    North -> Position(x: position.x, y: position.y + 1)
    East -> Position(x: position.x + 1, y: position.y)
    South -> Position(x: position.x, y: position.y - 1)
    West -> Position(x: position.x - 1, y: position.y)
  }
}