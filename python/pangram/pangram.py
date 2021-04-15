import string

def is_pangram(sentence):
    alphabet = list(string.ascii_lowercase)
    sentence = list(sentence.lower())

    difference = list(set(alphabet) - set(sentence))

    return len(difference) == 0
