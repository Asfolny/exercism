import string

def rows(letter: string) -> list:
    uppercases = list(string.ascii_uppercase)

    if letter not in uppercases:
        raise ValueError("letter is not a valid ascii uppercase")

    diamond = []
    length = uppercases.index(letter) * 2 + 1

    for line in range(length // 2 + 1):
        letter_pos = [length // 2 - line, length // 2 + line] if line > 0 else [length // 2]

        row = []
        for point_index in range(length):
            point = " " if point_index not in letter_pos else uppercases[line]
            row.append(point)

        diamond.append("".join(row))

    for line in range(length // 2, 0, -1):
        letter_pos = [length // 2 - line+1, length // 2 + line-1] if line > 1 else [length // 2]
        
        row = []
        for point_index in range(length):
            point = " " if point_index not in letter_pos else uppercases[line-1]
            row.append(point)

        diamond.append("".join(row))

    return diamond