export class InvalidInputError extends Error {
  constructor(message) {
    super()
    this.message = message || 'Invalid Input'
  }
}

export class Robot {
  constructor() {
    this.direction = 'north'
    this.x = 0
    this.y = 0
  }
  
  get bearing() {
    return this.direction
  }

  get coordinates() {
    return [this.x, this.y]
  }

  place({ x, y, direction }) {
    if (!['north', 'south', 'west', 'east'].includes(direction)) {
      throw new InvalidInputError('Invalid direction')
    }

    this.direction = direction
    this.x = x
    this.y = y
  }

  evaluate(instructions) {
    for (const instruction of instructions.split('')) {
      switch(instruction) {
        case 'L':
          this.left()
          break
          
        case 'R':
          this.right()
          break
          
        case 'A':
          this.advance()
          break
          
        default:
          throw new InvalidInputError('Not supported instruction')
      }
    }
  }

  left() {
    switch(this.bearing) {
      case 'north':
        this.direction = 'west'
        break
        
      case 'east':
        this.direction = 'north'
        break
        
      case 'south':
        this.direction = 'east'
        break
        
      case 'west':
        this.direction = 'south'
        break
    }
  }

  right() {
    switch(this.bearing) {
      case 'north':
        this.direction = 'east'
        break
        
      case 'east':
        this.direction = 'south'
        break
        
      case 'south':
        this.direction = 'west'
        break
        
      case 'west':
        this.direction = 'north'
        break
    }
  }

  advance() {
    switch(this.bearing) {
      case 'north':
        this.y++
        break
        
      case 'east':
        this.x++
        break
        
      case 'south':
        this.y--
        
        break
      case 'west':
        this.x--
        break
    }
  }
}
