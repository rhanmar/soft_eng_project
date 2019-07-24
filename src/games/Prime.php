<?php

namespace BrainGames\games\Prime;

use function BrainGames\Core\runCore;
use const BrainGames\Core\NUMBER_OF_ROUNDS;

const DECSRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\"";
const MIN = 1;
const MAX = 10;

function isPrime($number)
{
    if ($number === 1) {
        return false;
    }
    $middleDiv = floor($number / 2);
    for ($i = 2; $i <= $middleDiv; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrime()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $number = rand(MIN, MAX);
        $correctAnswer = (isPrime($number) ? 'yes' : 'no');
        $gameData[] = ['question' => $number, 'correct answer' => strval($correctAnswer)];
    }
    runCore($gameData, DECSRIPTION);
}
