<?php

function isPangram(string $sentence): bool
{
    $sentence = preg_replace('/[\s\d\W_.-]*/i', '', strtolower($sentence));

    $patternArray  = range('a', 'z'); //mb_str_split('abcdefghigklmopqrstuvwxyz');
    $sentenceArray = array_unique(mb_str_split($sentence));

    return count(array_diff($patternArray, $sentenceArray)) === 0;
}