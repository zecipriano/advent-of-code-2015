<?php

namespace AdventOfCode2015\Day01;

class PresentSide
{
    public function __construct(
        private readonly int $side1,
        private readonly int $side2)
    {
    }

    public function area(): int
    {
        return $this->side1 * $this->side2;
    }

    public function perimeter(): int
    {
        return 2 * ($this->side1 + $this->side2);
    }
}
