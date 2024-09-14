<?php declare(strict_types=1);

function detectAnagrams(string $word, array $anagrams): array
{
    $result = [];
    $wordArr = array_map('mb_strtolower', mb_str_split($word));
    sort($wordArr);
    foreach($anagrams as $anagram) {
        if (mb_strtolower($word) === mb_strtolower($anagram)) {
            continue;
        }

        $anagramArr = array_map('mb_strtolower', mb_str_split($anagram));
        sort($anagramArr);
        if ($wordArr === $anagramArr) {
            $result[] = $anagram;
        }
    }

    return $result;
}
