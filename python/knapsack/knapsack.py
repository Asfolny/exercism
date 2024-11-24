def maximum_value(maximum_weight, items):
    combinations = {(0, 0)}
    for item in items:
        combinations |= {(w+item['weight'], v+item['value']) for w, v in combinations}

    return max(v for w, v in combinations if w <= maximum_weight)
