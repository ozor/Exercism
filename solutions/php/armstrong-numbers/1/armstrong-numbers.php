<?php

function isArmstrongNumber(int $number): bool
{
    if ($number === 0) {
        return true;
    }

    $numberArray = str_split((string)$number);
    $countDigits = count($numberArray);

    $sumOfDigits = array_reduce($numberArray, function ($carry, $item) use ($countDigits) {
        $carry += (int)$item ** $countDigits;
        return $carry;
    }, 0);

    return $sumOfDigits === $number;
}