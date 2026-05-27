<?php

function wordCount(string $phrase): array {
    $wordCounter = [];

    $words = str_word_count($phrase, 1, 1234567890);
    foreach ($words as $word) {
        $word = strtolower(trim($word));
        if (empty($word)) {
            continue;
        }

        if (isset($wordCounter[$word])) {
            $wordCounter[$word]++;
        } else {
            $wordCounter[$word] = 1;
        }
    }

    return $wordCounter;
}