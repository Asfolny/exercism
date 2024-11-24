def is_pangram(sentence): 
    characterSet = {char for char in sentence.lower() if char.isalpha()}
    return len(characterSet) == 26