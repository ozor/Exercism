<?php

/**
 * Space Age
 *
 * Given an age in seconds, the class calculates how old someone would be on different planets
 */
class SpaceAge
{
    /**
     * Earth: orbital period 365.25 Earth days, or 31557600 seconds
     */
    private const EARTH_ORBITAL_PERIOD = 31557600;
    /**
     * Mercury: orbital period 0.2408467 Earth years
     * Venus: orbital period 0.61519726 Earth years
     * Mars: orbital period 1.8808158 Earth years
     * Jupiter: orbital period 11.862615 Earth years
     * Saturn: orbital period 29.447498 Earth years
     * Uranus: orbital period 84.016846 Earth years
     * Neptune: orbital period 164.79132 Earth years
     */
    private const COEFFICIENT_MERCURY = 0.2408467;
    private const COEFFICIENT_VENUS = 0.61519726;
    private const COEFFICIENT_MARS = 1.8808158;
    private const COEFFICIENT_JUPITER = 11.862615;
    private const COEFFICIENT_SATURN = 29.447498;
    private const COEFFICIENT_URANUS = 84.016846;
    private const COEFFICIENT_NEPTUNE = 164.79132;

    private int $ageInSeconds = 0;

    public function __construct(int $ageInSeconds)
    {
        $this->ageInSeconds = $ageInSeconds;
    }

    public function seconds(): int
    {
        return $this->ageInSeconds;
    }

    public function earth(): float
    {
        return round($this->ageInSeconds / self::EARTH_ORBITAL_PERIOD, 2);
    }

    public function mercury(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_MERCURY), 2);
    }

    public function venus(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_VENUS), 2);
    }

    public function mars(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_MARS), 2);
    }

    public function jupiter(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_JUPITER), 2);
    }

    public function saturn(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_SATURN), 2);
    }

    public function uranus(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_URANUS), 2);
    }

    public function neptune(): float
    {
        return round($this->ageInSeconds / (self::EARTH_ORBITAL_PERIOD * self::COEFFICIENT_NEPTUNE), 2);
    }
}