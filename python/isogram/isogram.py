def is_isogram(string):
    string = string.replace(' ', '').replace('-', '').lower()
    known = []

    for letter in string:
        if letter in known:
            return False
        known.append(letter)
    return True
