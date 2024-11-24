def score(word):
    pointToLetter = {
        1: ["A", "E", "I", "O", "U", "L", "N", "R", "S", "T"],
        2: ["D", "G"],
        3: ["B", "C", "M", "P"],
        4: ["F", "H", "V", "W", "Y"],
        5: ["K"],
        8: ["J", "X"],
        10: ["Q", "Z"]
    }

    score = 0
    for c in word.upper():
        for val, letters in pointToLetter.items():
            if c in letters:
                score += val
    
    return score
