def annotate(minefield):
    # Matrix of m[row][col] = v
    minefield = [[point for point in points] for points in minefield]

    # sanity pass, row must be consistently long
    length = -1
    for row in minefield:
        if length == -1:
            length = len(row)

        if length != len(row):
            raise ValueError('The board is invalid with current input.')
            

    for i, row in enumerate(minefield):
        for j, col in enumerate(row):
            if col != ' ' and col != '*':
                raise ValueError("The board is invalid with current input.")

            if col == '*':
                continue

            directions = [
                (-1, -1), (-1, 0), (0, -1),
                (1, 1), (1, 0), (0, 1),
                (-1, 1), (1, -1)
            ]
            bombsAround = 0

            for direction in directions:
                newRow = direction[0] + i
                newCol = direction[1] + j

                if 0 <= newRow < len(minefield) and \
                   0 <= newCol < len(minefield[newRow]) and \
                   minefield[newRow][newCol] == '*':
                    bombsAround += 1

            minefield[i][j] = bombsAround if bombsAround > 0 else ' '

        minefield[i] = "".join(map(str, minefield[i]))
    return minefield
