import string

def abbreviate(words):
    acronym = words[0].upper()
    prevChar = words[0]
    alpha = string.ascii_lowercase + string.ascii_uppercase + "'"
    print(alpha)
    for char in words[1:]:
        if prevChar not in alpha and char in alpha:
            acronym += char.upper()
        prevChar = char

    return acronym
