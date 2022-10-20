<?php

namespace AdventOfCode2015\Day01;

class Present
{
    public function __construct(
        private readonly int $l,
        private readonly int $w,
        private readonly int $h
    ) {
    }

    /**
     * Paper needed is the dimension of the box plus the area of the smallest
     * side.
     */
    public function paperNeeded(): int
    {
        $sides = [
            $this->l * $this->w,
            $this->w * $this->h,
            $this->h * $this->l,
        ];

        sort($sides); // The smallest side is now on position 0

        return (3 * $sides[0]) + (2 * $sides[1]) + (2 * $sides[2]);
    }
}
