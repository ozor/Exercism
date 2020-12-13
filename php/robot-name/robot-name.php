<?php

/**
 * A Robot Name manager
 */
class Robot
{
    /**
     * Uses for a Robot's name generator
     *
     * @var string
     */
    const LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * List of already used names
     *
     * @var array
     */
    private static $usedNames = [];

    /**
     * The Robot's name
     *
     * @var string
     */
    private $name;

    public function __construct()
    {
        $this->reset();
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * (re)set the Robot's name
     */
    public function reset()
    {
        $this->name = $this->generateName();
        while(in_array($this->name, self::$usedNames)) {
            $this->name = $this->generateName();
        }
        self::$usedNames[] = $this->name;
    }

    /**
     * A Robot's name generator
     *
     * @return string
     */
    private function generateName(): string
    {
        return sprintf(
            '%s%s%u',
            $this->getRandomLetter(),
            $this->getRandomLetter(),
            rand(100, 999)
        );
    }

    private function getRandomLetter(): string
    {
        return self::LETTERS[rand(0, strlen(self::LETTERS) - 1)];
    }
}