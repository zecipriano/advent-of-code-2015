<?php

namespace Tests\Day05;

use AdventOfCode2015\Day05\Rules;
use AdventOfCode2015\Day05\StringChecker;
use PHPUnit\Framework\TestCase;

class StringCheckerTest extends TestCase
{
    /** @dataProvider ruleset01 */
    public function test_it_checks_strings_with_ruleset_01($string, $expected): void
    {
        $checker = new StringChecker(Rules::RULESET01);
        self::assertSame($expected, $checker->isNice($string));
    }

    /** @dataProvider ruleset02 */
    public function test_it_checks_strings_with_ruleset_02($string, $expected): void
    {
        $checker = new StringChecker(Rules::RULESET02);
        self::assertSame($expected, $checker->isNice($string));
    }

    private function ruleset01(): array
    {
        return [
            ['ugknbfddgicrmopn', true],
            ['aaa', true],
            ['jchzalrnumimnmhp', false],
            ['haegwjzuvuyypxyu', false],
            ['dvszwmarrgswjxmb', false],
            ['rthkunfaakmwmush', true],
        ];
    }

    private function ruleset02(): array
    {
        return [
            ['qjhvhtzxzqqjkmpb', true],
            ['xxyxx', true],
            ['uurcxstgmygtbstg', false],
            ['ieodomkazucvgmuy', false],
            ['rthkunfaakmwmush', false],
        ];
    }
}
