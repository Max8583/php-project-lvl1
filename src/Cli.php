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

function games()
{

    $question = function () {
        return rand(1, 100);
    };

    $getRightAnswer = function ($number) {
        $result = $number % 2 == 0;
         return $result ? "yes" : "no";
    };

    play($question, $getRightAnswer);
}

function play($getQuestionFunc, $getRightAnswerFunc)
{
    $name = run();
    line('Answer "yes" if number even otherwise answer "no".');
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
