<?php

namespace Tests\Day06;

use AdventOfCode2015\Day06\Instruction;
use AdventOfCode2015\Day06\InstructionType;
use PHPUnit\Framework\TestCase;

class InstructionTest extends TestCase
{
    /** @dataProvider instructions */
    public function test_it_parses_instructions_from_string(string $string, Instruction $expectedInstruction): void
    {
        self::assertEquals($expectedInstruction, Instruction::fromString($string));
    }

    private function instructions(): array
    {
        return [
            ['turn on 0,0 through 999,999', new Instruction(InstructionType::turnOn, 0, 0, 999, 999)],
            ['toggle 0,0 through 999,0', new Instruction(InstructionType::toggle, 0, 0, 999, 0)],
            ['turn off 499,499 through 500,50', new Instruction(InstructionType::turnOff, 499, 499, 500, 50)],
        ];
    }
}
