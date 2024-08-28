def find_anagrams(word, candidates) -> list:
    sortedWord = ''.join(sorted(word.lower()))
    anagrams = []
    for candidate in candidates:
        sortedCandidate = ''.join(sorted(candidate.lower()))
        if sortedWord == sortedCandidate and word.lower() != candidate.lower():
            anagrams.append(candidate)

    return anagrams
