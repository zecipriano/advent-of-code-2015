<?php

namespace Tests\Day06;

use AdventOfCode2015\Day06\BrightnessLightsGrid;
use AdventOfCode2015\Day06\Instruction;
use AdventOfCode2015\Day06\InstructionType;
use PHPUnit\Framework\TestCase;

class BrightnessLightsGridTest extends TestCase
{
    public function test_it_regulates_brightness(): void
    {
        $lightsGrid = new BrightnessLightsGrid();

        $lightsGrid->instruction(new Instruction(InstructionType::turnOn, 0, 0, 0, 0));

        self::assertSame(1, $lightsGrid->total());

        $lightsGrid->instruction(new Instruction(InstructionType::toggle, 0, 0, 2, 2));
        self::assertSame(19, $lightsGrid->total());

        $lightsGrid->instruction(new Instruction(InstructionType::turnOff, 0, 0, 2, 2));
        self::assertSame(10, $lightsGrid->total());
    }
}
