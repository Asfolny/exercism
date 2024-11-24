def egg_count(display_value):
    eggs = 0
    max = 0
    while 2 ** max < display_value:
        max += 1

    for i in range(max, -1, -1):
        if display_value >= 2 ** i:
            eggs += 1
            display_value -= 2 ** i

    return eggs
