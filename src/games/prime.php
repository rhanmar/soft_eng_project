<?php

namespace MindCoach\games\Prime;

use function MindCoach\Core\runCore;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\"";

function isPrime($number)
{
    if ($number <= 1) {
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

function runPrime($gameData)
{
    $radnParams = $gameData->getRandParams();

    $result = [];

    for ($i = 0; $i < $gameData->getRoundsCount(); $i++) {

        $number = rand($radnParams[0], $radnParams[1]);

        $correctAnswer = (isPrime($number) ? 'yes' : 'no');
        
        $result[] = [$number, strval($correctAnswer)];
    }

    $gameData->setGameData($result);
    $gameData->setDescription(DESCRIPTION);

    runCore($gameData);
}
