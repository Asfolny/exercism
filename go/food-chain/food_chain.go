package foodchain

import "strings"

func Verse(v int) string {
	verse := []string {strings.Join(VERSES[v-1], "\n")}

    if v <= len(CHORUS) {
        for i := v; i > 0; i-- {
            verse = append(verse, CHORUS[i-1])
        }
    }

    return strings.Join(verse, "\n")
}

func Verses(start, end int) string {
	verses := []string{}
    
    for i := start; i <= end; i++ {
        verses = append(verses, Verse(i))
    }

    return strings.Join(verses, "\n\n")
}

func Song() string {
	return Verses(1, 8)
}

var CHORUS = [...]string {
    "I don't know why she swallowed the fly. Perhaps she'll die.",
    "She swallowed the spider to catch the fly.",
    "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
    "She swallowed the cat to catch the bird.",
    "She swallowed the dog to catch the cat.",
    "She swallowed the goat to catch the dog.",
    "She swallowed the cow to catch the goat.",
}

var VERSES = [...][]string {
    []string{"I know an old lady who swallowed a fly."},
    []string{
        "I know an old lady who swallowed a spider.",
        "It wriggled and jiggled and tickled inside her.",
    },
    []string{
        "I know an old lady who swallowed a bird.",
        "How absurd to swallow a bird!",
    },
    []string{
        "I know an old lady who swallowed a cat.",
        "Imagine that, to swallow a cat!",
    },
    []string{
        "I know an old lady who swallowed a dog.",
        "What a hog, to swallow a dog!",
    },
    []string{
        "I know an old lady who swallowed a goat.",
        "Just opened her throat and swallowed a goat!",
    },
    []string{
        "I know an old lady who swallowed a cow.",
        "I don't know how she swallowed a cow!",
    },
    []string{
        "I know an old lady who swallowed a horse.",
        "She's dead, of course!",
    },
}
