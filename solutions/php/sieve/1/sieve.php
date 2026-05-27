<?php

function sieve(int $number): array
{
    $currentNumber = 2;
    if ($number < $currentNumber) {
        return [];
    }
    if ($number === $currentNumber) {
        return [$number];
    }

    $numbersRange = range($currentNumber, $number);
    $resultRange  = [];

    while ($numbersRange) {
        $resultRange[] = $iterationNumber = $currentNumber;

        $i = 2;
        while ($number >= $iterationNumber) {
            unset($numbersRange[array_search($iterationNumber, $numbersRange)]);

            $iterationNumber = $currentNumber * $i++;
        }

        reset($numbersRange);
        $currentNumber = current($numbersRange);
    }

    return $resultRange;
}