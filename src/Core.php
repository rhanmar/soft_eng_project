<?php

namespace BrainGames\Core;

use function \cli\line;
use function \cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runCore($gameData, $gameDescription)
{
    line("Welcome to the Brain Games!");
    line($gameDescription);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $question = $gameData[$i]['question'];
        $correctAnswer = $gameData[$i]['correct answer'];
        
        line();
        line("Question: %s", $question);
        $answer = prompt('Your answer: ');
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line('"%s" is wrong answer ;( Correct answer was "%s"', $answer, $correctAnswer);
            line("Let's try again, %s", $name);
        }
    }

    line("Congratulations, %s!", $name);
}
