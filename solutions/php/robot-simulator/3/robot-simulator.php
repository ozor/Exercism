<?php

class Robot
{
    const DIRECTION_NORTH = 'north';

    const DIRECTION_SOUTH = 'south';

    const DIRECTION_WEST = 'west';

    const DIRECTION_EAST = 'east';

    const TURN_LEFT = 'L';

    const TURN_RIGHT = 'R';

    const ADVANCE = 'A';

    /**
     * Direction:
     *    base[left, right]
     *
     * @var array|string[][]
     */
    public static array $map = [
        self::DIRECTION_NORTH => [
            self::TURN_LEFT => self::DIRECTION_WEST,
            self::TURN_RIGHT => self::DIRECTION_EAST,
        ],
        self::DIRECTION_SOUTH => [
            self::TURN_LEFT => self::DIRECTION_EAST,
            self::TURN_RIGHT => self::DIRECTION_WEST,
        ],
        self::DIRECTION_WEST => [
            self::TURN_LEFT => self::DIRECTION_SOUTH,
            self::TURN_RIGHT => self::DIRECTION_NORTH,
        ],
        self::DIRECTION_EAST => [
            self::TURN_LEFT => self::DIRECTION_NORTH,
            self::TURN_RIGHT => self::DIRECTION_SOUTH,
        ],
    ];

    public array $position;

    public string $direction;

    private array $instructions = [
        self::TURN_RIGHT => 'turnRight',
        self::TURN_LEFT => 'turnLeft',
        self::ADVANCE => 'advance',
    ];

    /**
     * Robot constructor.
     *
     * @param array $position
     * @param string $direction
     */
    public function __construct(array $position, string $direction)
    {
        $this->direction = $direction;
        $this->position = $position;
    }

    public function instructions(string $instructions): void
    {
        array_map(function($instruction) {
            if (!isset($this->instructions[$instruction])) {
                throw new InvalidArgumentException('Invalid instruction');
            }
            call_user_func([$this, $this->instructions[$instruction]]);
        }, str_split($instructions));
    }

    public function turnLeft(): self
    {
        $this->direction = self::$map[$this->direction][self::TURN_LEFT];

        return $this;
    }

    public function turnRight(): self
    {
        $this->direction = self::$map[$this->direction][self::TURN_RIGHT];

        return $this;
    }

    public function advance(): self
    {
        list($x, $y) = $this->position;

        switch ($this->direction) {
            case self::DIRECTION_NORTH:
                $y++;
                break;
            case self::DIRECTION_SOUTH:
                $y--;
                break;
            case self::DIRECTION_WEST:
                $x--;
                break;
            case self::DIRECTION_EAST:
                $x++;
                break;
        }

        $this->position = [$x, $y];

        return $this;
    }
}