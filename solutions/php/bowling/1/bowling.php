<?php

class Game
{
    private array $frames = [];

    private int $current = 0;

    private int $score = 0;

    public function __construct()
    {
        $this->frame = new Frame();
    }

    public function roll(int $pin): void
    {
        $frame = new Frame();
        $frame->roll($pin);

        $previous = $this->current > 0 ? $this->current - 1 : 0;

        $this->frames[$this->current] = $frame;

        if ($frame->count() == 2 || $frame->score() == 10) {

            $this->current++;
        }

        $pin1 = null;
        $pin2 = null;
        switch ($frame->count()) {
            case 1:
                list($pin1, $pin2) = $frame->rolls();
                break;
            case 2:
                $pin1 = $frame->rolls();
                break;
        }

        for ($i = $previous; $i > 0; $i--) {
            if ($this->frames[$i] == Frame::ROLL_TYPE_SPARE && $this->frames[$i]->count() != 3) {
                $this->frames[$i]->roll($pin1);
            }
            if ($this->frames[$i] == Frame::ROLL_TYPE_STRIKE) {

            }
        }
    }

    public function score(): int
    {
        if (empty($this->frames)) {
            throw new Exception();
        }

        return $this->score;
    }
}

class Frame
{
    public const ROLL_TYPE_OPEN = 'open';
    public const ROLL_TYPE_SPARE = 'spare';
    public const ROLL_TYPE_STRIKE = 'strike';

    private array $rolls = [];

    private string $type;

    public function roll($pin)
    {
        if ($pin > 10 || $pin < 0) {
            throw new Exception();
        }

        $this->checkRollType();
        switch ($this->type()) {
            case self::ROLL_TYPE_STRIKE:
                $this->rollStrike($pin);
                break;
            case self::ROLL_TYPE_SPARE:
                $this->rollSpare($pin);
                break;
            default:
                $this->rollOpen($pin);
        }
    }

    public function score(): int
    {
        return array_sum($this->rolls);
    }

    public function type(): string
    {
        return $this->type;
    }

    public function rolls(): array
    {
        return $this->rolls;
    }

    public function count(): int
    {
        return count($this->rolls);
    }

    public function isStrikeDetermined()
    {
        return self::ROLL_TYPE_STRIKE && $this->count() == 3;
    }

    private function checkRollType(): void
    {
        if (in_array($this->type, [self::ROLL_TYPE_STRIKE, self::ROLL_TYPE_SPARE])) {
            return;
        }

        if ($this->score() == 10 && $this->count() == 1) {
            $this->type = self::ROLL_TYPE_STRIKE;
            return;
        }

        if ($this->score() == 10 && $this->count() == 2 && $this->rolls[0] != 10) {
            $this->type = self::ROLL_TYPE_SPARE;
            return;
        }

        $this->type = self::ROLL_TYPE_OPEN;
    }

    private function rollStrike($pin)
    {
        if ($this->rolls[0] == 10 && $this->count() < 3) {
            $this->rolls[] = $pin;
        }
    }

    private function rollSpare($pin)
    {
        if ($this->score() == 10 && $this->count() == 2) {
            $this->rolls[] = $pin;
        }
    }

    private function rollOpen($pin)
    {
        if ($this->score() < 10 && $this->count() < 2) {
            $this->rolls[] = $pin;
        }
    }
}