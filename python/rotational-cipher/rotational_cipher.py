def rotate(text, key):
    cipher = ''
    key %= 26 # ensure it's normalized over the alphabet

    for char in text:
        res = None
        ordinance = ord(char)
        if 65 <= ordinance <= 90:
            res = 65
        if 97 <= ordinance <= 122:
            res = 97

        if res is None:
            cipher += char
            continue

        ordinance -= res
        ordinance = (ordinance + key) % 26
        ordinance += res
        cipher += chr(ordinance)

    return cipher
        