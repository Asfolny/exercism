def primes(limit):
    if limit < 2:
        return []

    r = []
    multiples = []
    for i in range(2, limit+1):
        if i not in multiples:
            r.append(i)

            j = i*2
            while j <= limit:
                if j not in multiples:
                    multiples.append(j)
                j += i
    return r
