<?php

namespace AdventOfCode2015\Day05;

class StringChecker
{
    public function isNice(string $string): bool
    {
        /**
         * (?=.*[aeiou].*[aeiou].*[aeiou]) Matches 3 vowels.
         * (?=.*(.)\1) Matches a repeated char
         * (?=^((?!ab|cd|pq|xy).)*$) Matches string without the given char pairs
         */
        $regex = '/(?=.*[aeiou].*[aeiou].*[aeiou])(?=.*(.)\1)(?=^((?!ab|cd|pq|xy).)*$).*$/m';

        return (bool) preg_match($regex, $string);
    }
}
