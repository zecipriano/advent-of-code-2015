<?php

namespace Tests\Day05;

use AdventOfCode2015\Day05\StringChecker;
use PHPUnit\Framework\TestCase;

class StringCheckerTest extends TestCase
{
    /** @dataProvider stringsProvider */
    public function test_it_checks_strings($string, $expected): void
    {
        $checker = new StringChecker();
        self::assertSame($expected, $checker->isNice($string));
    }

    private function stringsProvider(): array
    {
        return [
            ['ugknbfddgicrmopn', true],
            ['aaa', true],
            ['jchzalrnumimnmhp', false],
            ['haegwjzuvuyypxyu', false],
            ['dvszwmarrgswjxmb', false],
            ['rthkunfaakmwmush', true],
            ['qxlnvjguikqcyfzt', false],
            ['sleaoasjspnjctqt', false],
            ['lactpmehuhmzwfjl', false],
            ['bvggvrdgjcspkkyj', false],
            ['nwaceixfiasuzyoz', false],
            ['hsapdhrxlqoiumqw', false],
            ['lsitcmhlehasgejo', false],
            ['hksifrqlsiqkzyex', false],
            ['dfwuxtexmnvjyxqc', false],
            ['iawwfwylyrcbxwak', true],
            ['mamtkmvvaeeifnve', true],
            ['qiqtuihvsaeebjkd', true],
            ['skerkykytazvbupg', false],
            ['kgnxaylpgbdzedoo', true],
            ['plzkdktirhmumcuf', false],
            ['pexcckdvsrahvbop', true],
            ['jpocepxixeqjpigq', false],
            ['vnsvxizubavwrhtc', false],
            ['lqveclebkwnajppk', true],
        ];
    }
}
