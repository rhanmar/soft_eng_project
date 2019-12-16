<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Core\runCore;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGcd($number1, $number2)
{
    //Euclidean algorithm
    $large = $number1 > $number2 ? $number1 : $number2;
    $small = $number1 > $number2 ? $number2 : $number1;
    $remainder = $large % $small;
    return 0 == $remainder ? $small : findGcd($small, $remainder);
}

function runGcd($gameData)
{
    $randParams = $gameData->getRandParams();

    $result = [];

    for ($i = 0; $i < $gameData->getRoundsCount(); $i++) {

        $number1 = rand($randParams[0], $randParams[1]);
        $number2 = rand($randParams[0], $randParams[1]);

        $correctAnswer = findGcd($number1, $number2);

        $question = "{$number1} {$number2}";
        
        $result[] = [$question, strval($correctAnswer)];
    }

    $gameData->setGameData($result);
    $gameData->setDescription(DESCRIPTION);

    runCore($gameData);
}
