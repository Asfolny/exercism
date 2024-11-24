//
// This is only a SKELETON file for the 'Minesweeper' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export const annotate = (input) => {
  const matrix = []

  for (const [rowPos, row] of Object.entries(input)) {
    const points = row.split('')
    input[rowPos] = points
  }
  
  for (const [rowPos, row] of Object.entries(input)) {
    matrix[rowPos] = []

    for (const [colPos, point] of Object.entries(row)) {
      if (point === "*") {
        matrix[rowPos][colPos] = "*"
        continue
      }

      let bombsAround = 0
      const directions = [
        [-1, -1], [-1, 0], [0, -1],
        [1, 1], [1, 0], [0, 1],
        [-1, 1], [1, -1]
      ]

      for (const dir of directions) {
        const newRowPos = dir[0] + parseInt(rowPos)
        const newColPos = dir[1] + parseInt(colPos)
        console.log(newRowPos, newColPos, newRowPos in input)
        if (newRowPos in input) {
          console.log(newColPos in input[newRowPos])
        }

        if (newRowPos in input &&
            newColPos in input[newRowPos] &&
            input[newRowPos][newColPos] === "*") {
          bombsAround++
        }
      }

      matrix[rowPos][colPos] = bombsAround === 0 ? " " : bombsAround
    }

    console.log(matrix[rowPos].join(''))
    matrix[rowPos] = matrix[rowPos].join('')
  }

  return matrix
}
