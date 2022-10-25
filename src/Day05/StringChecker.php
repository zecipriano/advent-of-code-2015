<?php

namespace AdventOfCode2015\Day05;

class StringChecker
{
    public function __construct(private readonly Rules $rules)
    {
    }

    public function isNice(string $string): bool
    {
        return (bool) preg_match($this->rules->value, $string);
    }
}

