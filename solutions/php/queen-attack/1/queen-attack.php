<?php

/**
 * Validates, can the Queen be placed on the position.
 */
class PlaceValidator
{
    public static function validate(int $vertical, int $horizontal)
    {
        self::validatePositive($vertical, $horizontal);
        self::validatePosition($vertical, $horizontal);
    }

    private static function validatePositive(int $vertical, int $horizontal)
    {
        if ($vertical < 0 || $horizontal < 0) {
            throw new InvalidArgumentException('The rank and file numbers must be positive.');
        }
    }

    private static function validatePosition(int $vertical, int $horizontal)
    {
        if ($vertical > 7 || $horizontal > 7) {
            throw new InvalidArgumentException('The position must be on a standard size chess board.');
        }
    }
}

class AttackChecker
{
    private array $firstQueenPosition;

    private array $secondQueenPosition;

    public function __construct($firstQueen, $secondQueen)
    {
        if ($firstQueen == $secondQueen) {
            throw new InvalidArgumentException('The Queens cannot be placed on the same position.');
        }

        $this->firstQueenPosition = $firstQueen;
        $this->secondQueenPosition = $secondQueen;
    }

    public function check(): bool
    {
        return $this->checkVertical() || $this->checkHorizontal() || $this->checkDiagonal();
    }

    /**
     * Checks, if can the Queen attack by the vertical line
     *
     * @return bool
     */
    private function checkVertical(): bool
    {
        return $this->firstQueenPosition[0] == $this->secondQueenPosition[0];
    }

    /**
     * Checks, if can the Queen attack by the horizontal line
     *
     * @return bool
     */
    private function checkHorizontal(): bool
    {
        return $this->firstQueenPosition[1] == $this->secondQueenPosition[1];
    }

    /**
     * Checks (recursive), if can the Queen attack by the diagonal line
     *
     * @param int $direction   Direction for the check (top-left, top-right, bottom-left, bottom-right)
     * @return bool
     */
    private function checkDiagonal(int $direction = 4): bool
    {
        if ($direction == 0) {
            return false;
        }

        $position = $this->firstQueenPosition;
        while ($this->canMove($position)) {
            if ($position == $this->secondQueenPosition) {
                return true;
            }

            $this->move($position, $direction);
        }

        return $this->checkDiagonal(--$direction);
    }

    private function canMove(array $position)
    {
        foreach ($position as $item) {
            if ($item > 7 || $item < 0) {
                return false;
            }
        }

        return true;
    }

    private function move(&$position, $direction)
    {
        switch ($direction) {
            case 4:
                $position[0]--;
                $position[1]--;
                break;
            case 3:
                $position[0]--;;
                $position[1]++;
                break;
            case 2:
                $position[0]++;;
                $position[1]--;
                break;
            case 1:
                $position[0]++;;
                $position[1]++;
                break;
        }
    }
}


function placeQueen(int $vertical, int $horizontal)
{
    PlaceValidator::validate($vertical, $horizontal);

    return true;
}

function canAttack(array $firstQueen, array $secondQueen): bool
{
    PlaceValidator::validate(...$firstQueen);
    PlaceValidator::validate(...$secondQueen);

    return (new AttackChecker($firstQueen, $secondQueen))->check();
}
