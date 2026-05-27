<?php

function raindrops(int $number): string {
    $numbers = [
        3 => 'Pling',
        5 => 'Plang',
        7 => 'Plong',
    ];

    $raindrop = '';
    foreach ($numbers as $key => $item) {
        if ($number % $key === 0) {
            $raindrop .= $numbers[$key];
        }
    }

    return $raindrop ?: $number;
}