<?php

namespace BrainGames\games\GCD;

use function BrainGames\Core\runCore;
use const BrainGames\Core\NUMBER_OF_ROUNDS;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN = 1;
const MAX = 100;

function findGCD($number1, $number2)
{
    $bigNumber = null;
    $smallNumber = null;

    if ($number1 > $number2) {
        $bigNumber = $number1;
        $smallNumber = $number2;
    } else {
        $bigNumber = $number2;
        $smallNumber = $number1;
    }

    if ($bigNumber % $smallNumber === 0) {
        return $smallNumber;
    }

    $result = 1;
    for ($i = 2; $i < $smallNumber; $i++) {
        if ($smallNumber % $i === 0) {
            if ($bigNumber % $i === 0) {
                $result = $i;
            }
        }
    }
    return $result;
}

function runGCD()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);
        $gcd = findGCD($number1, $number2);
        $question = "{$number1} {$number2}";
        $gameData[] = ['question' => $question, 'correct answer' => strval($gcd)];
    }
    runCore($gameData, DESCRIPTION);
}
