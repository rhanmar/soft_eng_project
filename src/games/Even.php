<?php

namespace BrainGames\games\Even;

use function BrainGames\Core\runCore;
use const BrainGames\Core\NUMBER_OF_ROUNDS;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"';
const MIN = 1;
const MAX = 100;

function isEven($number)
{
    return ($number % 2 === 0);
}

function runEven()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $number = rand(MIN, MAX);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $gameData[] = ['question' => $number, 'correct answer' => $correctAnswer];
    }
    runCore($gameData, DESCRIPTION);
}
