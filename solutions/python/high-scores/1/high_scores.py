
def latest(scores):
    return scores[-1]


def personal_best(scores):
    return max(scores)


def personal_top_three(scores):
    if len(scores) < 3:
        return sorted(scores, reverse=True)

    result = []
    while len(result) < 3:
        index = list.index(scores, max(scores))
        result.append(scores.pop(index))

    return sorted(result, reverse=True)
