<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ANSWERS_COUNT = 3;

function run()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s", $name);
    return $name;
}