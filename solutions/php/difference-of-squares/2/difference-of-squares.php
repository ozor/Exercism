<?php

function squareOfSum(int $number): int
{
    $sum = 0;
    foreach (range(1, $number) as $item) {
        $sum += $item;
    }

    return $sum ** 2;
}

function sumOfSquares(int $number): int
{
    return array_sum(
        array_map(function ($number) {
            return $number ** 2;
        }, range(1, $number))
    );


    /*$sum = 0;
    foreach (range(1, $number) as $item) {
        $sum += $item ** 2;
    }

    return $sum;*/
}

function difference(int $number): int
{
    return squareOfSum($number) - sumOfSquares($number);
}