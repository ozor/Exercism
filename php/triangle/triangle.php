<?php

class Triangle
{
    private const TRIANGLE_TYPE_EQUILATERAL = 'equilateral';
    private const TRIANGLE_TYPE_ISOSCELES = 'isosceles';
    private const TRIANGLE_TYPE_SCALENE = 'scalene';

    private float $side1;
    private float $side2;
    private float $side3;

    private ?string $triangleType;

    public function __construct(float $side1, float $side2, float $side3)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
    }

    public function kind(): string
    {
        $this->validate();

        $this->triangleType = null;

        $this->checkEquilateral();
        $this->checkIsosceles();
        $this->checkScalene();

        if (empty($this->triangleType)) {
            throw new Exception('Unknown Triangle Type');
        }

        return $this->triangleType;
    }

    /**
     * @throws Exception
     */
    private function validate(): void
    {
        if ($this->side1 == 0 || $this->side2 == 0 || $this->side3 == 0) {
            throw new Exception('Zero length violence');
        }

        if (
            ($this->side1 + $this->side2 < $this->side3) ||
            ($this->side2 + $this->side3 < $this->side1) ||
            ($this->side1 + $this->side3 < $this->side2)
        ) {
            throw new Exception('Triangle Inequality violence');
        }
    }

    private function checkEquilateral(): void
    {
        if ($this->side1 == $this->side2 && $this->side2 == $this->side3) {
            $this->triangleType = self::TRIANGLE_TYPE_EQUILATERAL;
        }
    }

    private function checkIsosceles(): void
    {
        if (
            ($this->side1 == $this->side2 && ($this->side2 != $this->side3)) ||
            ($this->side2 == $this->side3 && ($this->side1 != $this->side2)) ||
            ($this->side1 == $this->side3 && ($this->side2 != $this->side3))
        ) {
            $this->triangleType = self::TRIANGLE_TYPE_ISOSCELES;
        }
    }

    private function checkScalene(): void
    {
        if ($this->side1 != $this->side2 && $this->side2 != $this->side3 && $this->side1 != $this->side3) {
            $this->triangleType = self::TRIANGLE_TYPE_SCALENE;
        }
    }
}
