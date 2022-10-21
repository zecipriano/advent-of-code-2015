<?php

namespace AdventOfCode2015\Day03;

class HousesMap
{
    private array $housesVisited;

    public function markHouseVisited(int $x, int $y): void
    {
        $this->housesVisited[$x][$y] = 1;
    }

    public function housesCount(): int
    {
        return array_sum(array_map('count', $this->housesVisited));
    }
}
