def distance(strand_a, strand_b):
    if len(strand_a) != len(strand_b):
        raise ValueError('Lengths are not equal')

    if len(strand_a) == 0 and len(strand_b) == 0:
        return 0

    distance = 0
    for i in range(len(strand_a)):
        if strand_a[i] != strand_b[i]:
            distance += 1

    return distance