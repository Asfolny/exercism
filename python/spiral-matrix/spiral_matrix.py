def spiral_matrix(size):
    if size < 1:
        return []

    x = 0
    y = 0
    direction = 'right'

    # using [[none] * size] * size will create pointers of those None to the same memory
    # causing the later loop to overwrite it, e.g. [[4, 3], [4, 3]] instead of [[1, 2, 4, 3]]
    r = []
    for i in range(size):
        row = []
        for j in range(size):
            row.append(None)
        r.append(row)

    for i in range(size * size):
        r[y][x] = i + 1

        match direction:
            case 'right':
                x += 1
                if x >= size or r[y][x] is not None:
                    x -= 1
                    direction = 'down'
                    y += 1

            case 'left':
                x -= 1
                if x < 0 or r[y][x] is not None:
                    x += 1
                    direction = 'up'
                    y -= 1

            case 'down':
                y += 1
                if y >= size or r[y][x] is not None:
                    y -= 1
                    direction = 'left'
                    x -= 1

            case 'up':
                y -= 1
                if y < 0 or r[y][x] is not None:
                    y += 1
                    direction = 'right'
                    x += 1
    return r
            