def steps(number):
    if number < 1:
        raise ValueError('Only positive integers are allowed')
    if number == 1:
        return 0

    return steps(number / 2) + 1 if number % 2 == 0 else steps(3 * number + 1) + 1
