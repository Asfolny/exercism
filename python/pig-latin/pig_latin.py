def translate(text):
    text = text.split(' ')
    
    for i, word in enumerate(text):
        if word[0] not in ['a', 'e', 'i', 'o', 'u'] and \
           word[0:2] not in ['xr', 'yt']:
            word = shift(word)
    
        text[i] = f"{word}ay"

    return " ".join(text)

def shift(word):
    word = list(word)
    word.append(word.pop(0))

    if word[0] == 'u' and word[-1] == 'q':
        word.append(word.pop(0))
        return "".join(word)

    if word[0] in ['a', 'e', 'i', 'o', 'u', 'y']:
        return "".join(word)

    return shift("".join(word))
    