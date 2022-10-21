<?php

namespace AdventOfCode2015\Day03;

class Santa
{
    public function __construct(
        private int $x,
        private int $y
    ) {}

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function moveNorth(): void
    {
        $this->y++;
    }

    public function moveSouth(): void
    {
        $this->y--;
    }

    public function moveEast(): void
    {
        $this->x++;
    }

    public function moveWest(): void
    {
        $this->x--;
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
}
