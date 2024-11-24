def commands(binary_str):
    input = int(binary_str, 2)
    output = []

    if input & 0b1:
        output.append("wink")

    if input & 0b10:
        output.append("double blink")

    if input & 0b100:
        output.append("close your eyes")

    if input & 0b1000:
        output.append("jump")

    if input & 0b10000:
        output = output[::-1]

    return output
