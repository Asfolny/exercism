package spiralmatrix

func SpiralMatrix(size int) [][]int {
    if size < 1 {
        return [][]int{}
    }

    x := 0
    y := 0
    dir := "right"
    spiral := [][]int{}

    for i := 0; i < size; i++ {
        row := []int{}
        for r := 0; r < size; r++ {
            row = append(row, 0)
        }
        spiral = append(spiral, row)
    }

    for i := 0; i < size * size; i++ {
    	spiral[y][x] = i + 1

    	switch dir {
    	case "right":
        	x++
            if x >= size || spiral[y][x] != 0 {
                x--
                dir = "down"
                y++
        	}

        case "left":
            x--
            if x < 0 || spiral[y][x] != 0 {
                x++
                dir = "up"
                y--
            }
            
        case "up":
            y--
            if y < 0 || spiral[y][x] != 0 {
                y++
                dir = "right"
                x++
            }

      	case "down":
        	y++
        	if y >= size || spiral[y][x] != 0 {
          		y--
          		dir = "left"
          		x--
        	}
    	}
  }

    return spiral
}