<?php

class Game
{
    private int $score = 0;

    private array $frames = [];

    public function roll(int $pins): void
    {
        if ($pins < 0) {
            throw new Exception('Count of pins cannot be less than zero');
        }
        if ($pins > 10) {
            throw new Exception('Count of pins cannot be greater than ten');
        }

        $totalFrames = count($this->frames);

        if (
            $totalFrames
            && (count($this->frames[$totalFrames-1]) === 1 && $this->frames[$totalFrames-1][0] !== 10) // The frame is INCOMPLETE and not a STRIKE
        ) {
            if ($this->frames[$totalFrames-1][0] + $pins > 10) {
                throw new Exception('Summary of a frame cannot be greater than ten');
            }
            array_push($this->frames[$totalFrames-1], $pins);
        } else {
            array_push($this->frames, [$pins]);
        }
    }

    public function score(): int
    {
        $totalFrames = count($this->frames);

        if (
            $totalFrames < 10
            || ($totalFrames > 10 && array_sum($this->frames[9]) < 10)
            || ($totalFrames === 10 && array_sum($this->frames[9]) >= 10)
            || ($totalFrames === 11 && $this->frames[$totalFrames-1][0] === 10 && $this->frames[$totalFrames-2][0] === 10)
        ) {
            throw new Exception('Wrong score calculation');
        }

        foreach($this->frames as $key => $frame) {
            if (count($frame) === 2 && array_sum($frame) === 10 && $key < 9) { // SPARE
                $this->score += $this->frames[$key+1][0];
            } elseif ($frame[0] === 10 && $key < 9) { // STRIKE
                $this->score += $this->frames[$key+1][0];

                if (count($this->frames[$key+1]) > 1) {
                    $this->score += $this->frames[$key+1][1];
                } else {
                    $this->score += $this->frames[$key+2][0];
                }
            }

            $this->score += array_sum($frame);
        };

        return $this->score;
    }
}