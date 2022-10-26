<?php

namespace Tests\Day06;

use AdventOfCode2015\Day06\Instruction;
use AdventOfCode2015\Day06\InstructionType;
use AdventOfCode2015\Day06\LightsGrid;
use PHPUnit\Framework\TestCase;

class LightsGridTest extends TestCase
{
    public function test_it_turns_on_lights(): void
    {
        $lightsGrid = new LightsGrid();

        $lightsGrid->instruction(new Instruction(InstructionType::turnOn, 0, 0, 4, 4));

        self::assertSame(25, $lightsGrid->total());
    }

    public function test_it_turns_off_lights(): void
    {
        $lightsGrid = new LightsGrid();

        $lightsGrid->instruction(new Instruction(InstructionType::turnOn, 0, 0, 4, 4));
        self::assertSame(25, $lightsGrid->total());

        $lightsGrid->instruction(new Instruction(InstructionType::turnOff, 2, 2, 4, 4));
        self::assertSame(16, $lightsGrid->total());
    }

    public function test_it_toggles_lights(): void
    {
        $lightsGrid = new LightsGrid();

        $lightsGrid->instruction(new Instruction(InstructionType::turnOn, 0, 0, 4, 4));
        self::assertSame(25, $lightsGrid->total());

        $lightsGrid->instruction(new Instruction(InstructionType::turnOff, 2, 2, 4, 4));
        self::assertSame(16, $lightsGrid->total());

        $lightsGrid->instruction(new Instruction(InstructionType::toggle, 1, 1, 3, 3));
        self::assertSame(15, $lightsGrid->total());
    }

    public function test_it_toggles_lights_not_yet_set(): void
    {
        $lightsGrid = new LightsGrid();
        $lightsGrid->instruction(new Instruction(InstructionType::toggle, 0, 0, 2, 2));

        self::assertSame(9, $lightsGrid->total());
    }
}
