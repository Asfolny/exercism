def largest_product(series, size):
    if size < 1:
        raise ValueError("span must not be negative")
    if len(series) < size:
        raise ValueError("span must be smaller than string length")
    if series.isdigit() == False:
        raise ValueError("digits input must only contain digits")

    max = 0
    
    for idx in range(0, len(series)-size+1, 1):
        num = 1
        for p in range(0, size):
            num *= int(series[idx+p])
        if num > max:
            max = num

    return max
