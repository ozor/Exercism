def is_isogram(string):
    list_of_strings = []
    for letter in string:
        if letter == '-' or letter == ' ':
            continue
        if letter.lower() in list_of_strings:
            return False
        list_of_strings.append(letter.lower())
    return True
