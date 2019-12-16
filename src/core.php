<?php

namespace BrainGames\Core;

use function \cli\line;

function getName()
{
    $standardName = "Guest";
    $name = readline("Name: ");
    if (strlen($name) === 0) {
        $name = $standardName;
    }
    return $name;
}

function start($name, $gameData)
{
    $points = 0;

    
    for ($i = 0; $i < $gameData->getRoundsCount(); $i++) {
        [$question, $correctAnswer] = $gameData->getGameData()[$i];
        line();
        line("Question: %s", $question);

        $answer = readline("Your answer: ");

        // Give a respond
        if ($answer === $correctAnswer) {
            line("Correct!");
            $points += 1;
        } elseif (strlen($answer) === 0) {
            line("Emptiness is wrong answer. Correct answer is %s", $correctAnswer);
        }
        else {
            line("%s is wrong answer", $answer);
            line("Correct answer is %s", $correctAnswer);
        }
    }  

    // Give an end
    line();
    if ($points === $gameData->getRoundsCount()) {
        line("You've earned maximum points quantity!");
    } else {
        line("You've got %d points!", $points);
    }
    line("Congratulations, %s!", $name);    
}


function runCore($gameData)
{    
    line();
    $name = getName();
    line("Hello, %s!", $name);

    line("Let's start!");
    line("Task: %s", $gameData->getDescription());

    start($name, $gameData);
}
