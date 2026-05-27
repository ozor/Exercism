<?php

function toDecimal(string $number): int
{
    $allowedNumbers = [0, 1, 2];
    $numberArray = array_reverse(str_split($number));

    $result = 0;
    foreach ($numberArray as $i => $item) {
        if (!in_array($item, $allowedNumbers)) {
            return 0;
        }
        $result += $item * pow(3, $i);
    }

    return $result;
}