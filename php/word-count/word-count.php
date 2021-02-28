<?php

function wordCount(string $phrase): array {
    $wordCounter = [];

    $words = str_word_count(strtolower($phrase), 1, 1234567890);

    foreach ($words as $word) {
        if (isset($wordCounter[$word])) {
            $wordCounter[$word]++;
        } else {
            $wordCounter[$word] = 1;
        }
    }

    return $wordCounter;
}