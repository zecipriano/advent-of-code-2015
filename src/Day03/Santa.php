<?php

namespace AdventOfCode2015\Day03;

class Santa
{
    public function __construct(
        private int $x,
        private int $y,
        private readonly HousesMap $housesMap,
    ) {
        $this->markHouseVisited();
    }

    public function moveNorth(): void
    {
        $this->y++;
        $this->markHouseVisited();
    }

    public function moveSouth(): void
    {
        $this->y--;
        $this->markHouseVisited();
    }

    public function moveEast(): void
    {
        $this->x++;
        $this->markHouseVisited();
    }

    public function moveWest(): void
    {
        $this->x--;
        $this->markHouseVisited();
    }

    public function moveFromChar(string $char): void
    {
        switch ($char) {
            case '^':
                $this->moveNorth();
                break;
            case 'v':
                $this->moveSouth();
                break;
            case '>':
                $this->moveEast();
                break;
            case '<':
                $this->moveWest();
                break;
        }
    }

    private function markHouseVisited(): void
    {
        $this->housesMap->markHouseVisited($this->x, $this->y);
    }
}
