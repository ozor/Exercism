<?php


function placeQueen(int $vertical, int $horizontal)
{
    $high = 7;
    $low = 0;

    if ($vertical > $high || $horizontal > $high) {
        throw new InvalidArgumentException('The position must be on a standard size chess board.');
    }

    if ($vertical < $low || $horizontal < $low) {
        throw new InvalidArgumentException('The rank and file numbers must be positive.');
    }

    return true;
}


function checkLine(array $firstQueen, array $secondQueen)
{
    return $firstQueen[0] === $secondQueen[0] || $firstQueen[1] === $secondQueen[1];
}

function checkDiagonal(array $firstQueen, array $secondQueen)
{
    return abs($firstQueen[0] - $secondQueen[0]) == abs($firstQueen[1] - $secondQueen[1]);
}


function canAttack(array $firstQueen, array $secondQueen): bool
{
    placeQueen(...$firstQueen);
    placeQueen(...$secondQueen);

    return checkLine($firstQueen, $secondQueen) || checkDiagonal($firstQueen, $secondQueen);
}
