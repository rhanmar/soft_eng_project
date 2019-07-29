<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Core\runCore;
use const BrainGames\Core\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN = 1;
const MAX = 100;

function findGcd($number1, $number2)
{
    //Euclidean algorithm
    $large = $number1 > $number2 ? $number1 : $number2;
    $small = $number1 > $number2 ? $number2 : $number1;
    $remainder = $large % $small;
    return 0 == $remainder ? $small : findGcd($small, $remainder);
}

function runGcd()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);
        $gcd = findGcd($number1, $number2);
        $question = "{$number1} {$number2}";
        $gameData[] = [$question, strval($gcd)];
    }
    runCore($gameData, DESCRIPTION);
}
