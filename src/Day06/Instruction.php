<?php

namespace AdventOfCode2015\Day06;

class Instruction
{
    public function __construct(
        public readonly InstructionType $type,
        public readonly int $x1,
        public readonly int $y1,
        public readonly int $x2,
        public readonly int $y2
    ) {}

    public static function fromString($string): self
    {
        // Get instruction type
        preg_match_all('/^(.*?)\d/m', $string, $matches, PREG_SET_ORDER, 0);
        $instructionStr = trim($matches[0][1]);

        $instructionType = match ($instructionStr) {
            'turn on' => InstructionType::turnOn,
            'turn off' => InstructionType::turnOff,
            'toggle' => InstructionType::toggle,
        };

        // Get coordinates
        preg_match_all('/\d+/m', $string, $matches, PREG_SET_ORDER, 0);

        return new self(
            $instructionType,
            $matches[0][0],
            $matches[1][0],
            $matches[2][0],
            $matches[3][0]
        );
    }
}
