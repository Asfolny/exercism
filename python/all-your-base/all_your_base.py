def rebase(input_base, digits, output_base):
    if input_base < 2:
        raise ValueError("input base must be >= 2")

    if output_base < 2:
        raise ValueError("output base must be >= 2")
    base = 0
    for i, v in enumerate(reversed(digits)):
        if v >= input_base or v < 0:
            raise ValueError("all digits must satisfy 0 <= d < input base")
        base += v * input_base ** i

    if base == 0:
        return [0]

    result = []
    power = 0

    while True:
        if output_base ** (power + 1) > base:
            break
        power += 1

    for p in range(power, -1, -1):
        high = output_base ** p
        i = 0
        while True:
            if high * (i + 1) > base:
                break
            i += 1

        result.append(i)
        base -= high * i

    return result