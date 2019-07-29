<?php

namespace BrainGames\games\Even;

use function BrainGames\Core\runCore;
use const BrainGames\Core\ROUNDS_COUNT;

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
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = rand(MIN, MAX);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $gameData[] = [$number, $correctAnswer];
    }
    runCore($gameData, DESCRIPTION);
}
