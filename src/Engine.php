<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\run;

use function cli\line;

const ANSWERS_COUNT = 3;

function playgames($string)
{
    line($string);
}

function play($string, $getQuestionFunc, $getRightAnswerFunc)
{
    $name = run();
    playgames($string);
    $rightAnswers = 0;
    $exit = false;

    while ($rightAnswers < ANSWERS_COUNT && !$exit) {
        $question = $getQuestionFunc();
        line('Question: ' . $question);
        $answer = \cli\prompt("Your answer is");
        if ($answer == $getRightAnswerFunc($question)) {
            line('Correct!');
            line();
            $rightAnswers++;
            continue;
        }

        line("%s is wrong answer ;(. Correct answer was %s", $answer, $getRightAnswerFunc($question));
        line("Let's try again, {$name}");
        $exit = true;
    }

    if ($rightAnswers == ANSWERS_COUNT) {
        line("Congratulations, {$name}");
    }
}