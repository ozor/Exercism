<?php

function detectAnagrams(string $pattern, array $words): array
{
    $anagrams = [];

    $pattern = mb_strtolower($pattern);
    $patternArray = mb_str_split($pattern);
    sort($patternArray, SORT_LOCALE_STRING);

    foreach ($words as $word) {
        $_word = mb_strtolower($word);
        if ($_word == $pattern || strlen($word) != strlen($pattern)) {
            continue;
        }

        $wordArray = mb_str_split($_word);
        sort($wordArray, SORT_LOCALE_STRING);

        $count = 0;
        foreach ($wordArray as $key => $letter) {
            if ($wordArray[$key] == $patternArray[$key]) {
                $count++;
            }
        }

        if (count($patternArray) == $count) {
            $anagrams[] = $word;
        }
    }

    return $anagrams;
}