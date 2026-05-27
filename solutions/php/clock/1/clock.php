<?php

class Clock
{
    public const DAY = 1440; // 24 hours = 1440 minutes

    private int $minutes;

    public function __construct(int $hours, ?int $minutes = 0)
    {
        $this->minutes = $hours * 60 + $minutes ?: 0;

        if (abs($this->minutes) > self::DAY) {
            $this->minutes = $this->minutes > 0
                ? $this->minutes - self::DAY * floor($this->minutes / self::DAY)
                : $this->minutes + self::DAY * floor(abs($this->minutes) / self::DAY)
            ;
        }

        if ($this->minutes < 0) {
            $this->minutes = self::DAY - abs($this->minutes);
        }
    }

    public function add(int $minutes): self
    {
        $this->minutes += $minutes;
        return $this;
    }

    public function sub(int $minutes): self
    {
        $this->minutes -= $minutes;
        return $this;
    }

    public function __toString(): string
    {
        $dateTime = new DateTime('2000-01-01 00:00:00');
        $dateInterval = DateInterval::createFromDateString(sprintf('%d minutes', abs($this->minutes)));

        $this->minutes > 0
            ? $dateTime->add($dateInterval)
            : $dateTime->sub($dateInterval)
        ;

        return $dateTime->format('H:i');
    }


}