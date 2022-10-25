<?php

namespace AdventOfCode2015\Day05;

enum Rules: string
{
    /**
     * (?=.*[aeiou].*[aeiou].*[aeiou])
     * It contains at least three vowels (aeiou only), like aei, xazegov, or
     * aeiouaeiouaeiou.
     *
     * (?=.*(.)\1)
     * It contains at least one letter that appears twice in a row, like xx,
     * abcdde (dd), or aabbccdd (aa, bb, cc, or dd).
     *
     * (?=^((?!ab|cd|pq|xy).)*$)
     * It does not contain the strings ab, cd, pq, or xy, even if they are part
     * of one of the other requirements.
     */
    case RULESET01 = '/(?=.*[aeiou].*[aeiou].*[aeiou])(?=.*(.)\1)(?=^((?!ab|cd|pq|xy).)*$).*$/m';

    /**
     * (?=.*(.{1}).{1}\1)
     * It contains a pair of any two letters that appears at least twice in the
     * string without overlapping, like xyxy (xy) or aabcdefgaa (aa), but not
     * like aaa (aa, but it overlaps).
     *
     * (?=.*(.{2}).*\2)
     * It contains at least one letter which repeats with exactly one letter
     * between them, like xyx, abcdefeghi (efe), or even aaa.
     */
    case RULESET02 = '/(?=.*(.{1}).{1}\1)(?=.*(.{2}).*\2).*$/m';
}
