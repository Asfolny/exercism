export const spiralMatrix = (size) => {
  if (size < 1) {
    return []
  }

  let x = 0
  let y = 0
  let direction = 'right'
  const spiral = []

  for (let i = 0; i < size; i++) {
    let row = []

    for (let j = 0; j < size; j++) {
      row.push(null)
    }

    spiral.push(row)
  }

  for (let i = 0; i < size * size; i++) {
    spiral[y][x] = i + 1

    switch(direction) {
      case 'right':
        x++
        if (x >= size || spiral[y][x] !== null) {
          x--
          direction = 'down'
          y++
        }
        break

      case 'left':
        x--
        if (x < 0 || spiral[y][x] !== null) {
          x++
          direction = 'up'
          y--
        }
        break

      case 'up':
        y--
        if (y < 0 || spiral[y][x] !== null) {
          y++
          direction = 'right'
          x++
        }
        break
      case 'down':
        y++
        if (y >= size || spiral[y][x] !== null) {
          y--
          direction = 'left'
          x--
        }
        break
    }
  }

  return spiral
}