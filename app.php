<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$app = new Application();

$app->addCommands([
    new AdventOfCode2015\Day01\Day01,
    new AdventOfCode2015\Day02\Day02,
    new AdventOfCode2015\Day03\Day03,
    new AdventOfCode2015\Day04\Day04,
    new AdventOfCode2015\Day05\Day05,
    new AdventOfCode2015\Day06\Day06,
]);

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
