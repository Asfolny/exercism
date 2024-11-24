def recite(start_verse, end_verse):
    r = []
           
    for v in range(start_verse-1, end_verse):
        chore = list(reversed(chorus[0:v+1])) if len(chorus) > v else []
        if len(r) > 0:
            r += ['']
        r += verses[v] + chore

    return r
chorus = [
    "I don't know why she swallowed the fly. Perhaps she'll die.",
    "She swallowed the spider to catch the fly.",
    "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
    "She swallowed the cat to catch the bird.",
    "She swallowed the dog to catch the cat.",
    "She swallowed the goat to catch the dog.",
    "She swallowed the cow to catch the goat."
]

verses = [
    ["I know an old lady who swallowed a fly."],
    [
        "I know an old lady who swallowed a spider.",
        "It wriggled and jiggled and tickled inside her."
    ],
    [
        "I know an old lady who swallowed a bird.",
        "How absurd to swallow a bird!"
    ],
    [
        "I know an old lady who swallowed a cat.",
        "Imagine that, to swallow a cat!"
    ],
    [
        "I know an old lady who swallowed a dog.",
        "What a hog, to swallow a dog!"
    ],
    [
        "I know an old lady who swallowed a goat.",
        "Just opened her throat and swallowed a goat!"
    ],
    [
        "I know an old lady who swallowed a cow.",
        "I don't know how she swallowed a cow!",
    ],
    [
        "I know an old lady who swallowed a horse.",
        "She's dead, of course!"
    ]
]
