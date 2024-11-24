export class InvalidInputError extends Error {
  constructor(message: string) {
    super()
    this.message = message || 'Invalid Input'
  }
}
type Coordinates = [number, number]

const ALL_DIRECTIONS = ['north', 'east', 'south', 'west'] as const;
type DirectionTuple = typeof ALL_DIRECTIONS;
type Direction = DirectionTuple[number];

function isDirection(value: string): value is Direction {
  return ALL_DIRECTIONS.includes(value as Direction)
}

export class Robot {
  public heading: Direction = 'north'
  public _x = 0
  public _y = 0

  get bearing(): Direction {
    return this.heading
  }

  get coordinates(): Coordinates {
    return [this._x, this._y]
  }

  place(placement: { x: number; y: number; direction: string }) {
    if (!isDirection(placement.direction)) {
      throw new InvalidInputError('Invalid direction')
    }

    this._x = placement.x
    this._y = placement.y
    this.heading = placement.direction
  }

  evaluate(instructions: string) {
    for (const instruction of instructions.split('')) {
      switch(instruction) {
        case 'A':
          switch(this.bearing) {
            case 'north':
              this._y++
              break
            case 'east':
              this._x++
              break
            case 'south':
              this._y--
              break
            case 'west':
              this._x--
              break
          }
          break
          
        case 'L':
          switch(this.bearing) {
            case 'north':
              this.heading = 'west'
              break
            case 'east':
              this.heading = 'north'
              break
            case 'south':
              this.heading = 'east'
              break
            case 'west':
              this.heading = 'south'
              break
          }
          break
          
        case 'R':
          switch(this.bearing) {
            case 'north':
              this.heading = 'east'
              break
            case 'east':
              this.heading = 'south'
              break
            case 'south':
              this.heading = 'west'
              break
            case 'west':
              this.heading = 'north'
              break
          }
          break
          
        default:
          throw new InvalidInputError('Invalid instruction')
      }
    }
  }
}
