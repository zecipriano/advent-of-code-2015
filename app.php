<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$app = new Application();

try {
    $app->run();
} catch (Exception $e) {
    var_dump($e);
}
