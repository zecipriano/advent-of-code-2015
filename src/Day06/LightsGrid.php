<?php

namespace AdventOfCode2015\Day06;

class LightsGrid
{
    /** @var array<array<int>> */
    protected array $grid;

    public function instruction(Instruction $instruction): void
    {
        $func = match ($instruction->type) {
            InstructionType::turnOn => 'turnOn',
            InstructionType::turnOff => 'turnOff',
            InstructionType::toggle => 'toggle',
        };

        $this->executeInstruction(
            $instruction->x1,
            $instruction->y1,
            $instruction->x2,
            $instruction->y2,
            [$this, $func]
        );
    }

    public function countLit(): int
    {
        return array_sum(array_map('array_sum', $this->grid));
    }

    protected function executeInstruction(int $x1, int $y1, int $x2, int $y2, callable $operation): void
    {
        for ($x = $x1; $x <= $x2; $x++) {
            for ($y = $y1; $y <= $y2; $y++) {
                $operation($x, $y);
            }
        }
    }

    protected function turnOn(int $x, int $y): void
    {
        $this->grid[$x][$y] = 1;
    }

    protected function turnOff(int $x, int $y): void
    {
        $this->grid[$x][$y] = 0;
    }

    protected function toggle(int $x, int $y): void
    {
        $this->grid[$x][$y] = $this->grid[$x][$y] ?? 0 ? 0 : 1;
    }
}
