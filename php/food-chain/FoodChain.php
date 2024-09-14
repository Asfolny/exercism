<?php declare(strict_types=1);

class FoodChain
{
    private const VERSES = [
        [
            "I know an old lady who swallowed a fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a spider.",
            "It wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a bird.",
            "How absurd to swallow a bird!",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
        ],
        [
            "I know an old lady who swallowed a cat.",
            "Imagine that, to swallow a cat!",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a dog.",
            "What a hog, to swallow a dog!",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a goat.",
            "Just opened her throat and swallowed a goat!",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a cow.",
            "I don't know how she swallowed a cow!",
            "She swallowed the cow to catch the goat.",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ],
        [
            "I know an old lady who swallowed a horse.",
            "She's dead, of course!"
        ]
    ];
    public function verse(int $verseNumber): array
    {
        return self::VERSES[$verseNumber-1];
    }

    public function verses(int $start, int $end): array
    {
        $r = [];
        for($i = $start; $i <= $end; $i++) {
            $r = array_merge($r, $this->verse($i));
            $r[] = "";
        }
        array_pop($r);
        return $r;
    }

    public function song(): array
    {
        return $this->verses(1, count(self::VERSES));
    }
}
