def distance(strand_a, strand_b):
    if len(strand_a) != len(strand_b):
        raise ValueError("Strands must be of equal length.")

    return len([diff for pos, diff in enumerate(strand_a) if strand_a[pos] != strand_b[pos]])
