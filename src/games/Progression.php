<?php

namespace BrainGames\games\Progression;

use function BrainGames\Core\runCore;
use const BrainGames\Core\NUMBER_OF_ROUNDS;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;

function makeProgression()
{
    $gameData = [];

    for ($k = 0; $k < NUMBER_OF_ROUNDS; $k++) {
        $d = rand(1, 5); // common difference of successive members
        $startMember = rand(1, 10); // start member of arithmetic progression
        $progAsArr = []; // arithmetic progression

        for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
            if ($i === 0) {
                $progAsArr[] = $startMember;
            } else {
                $progAsArr[] = $progAsArr[$i - 1] + $d;
            }
        }
        $indexOfMissingNumber = rand(0, count($progAsArr) - 1);
        $missingNumber = $progAsArr[$indexOfMissingNumber];
        $progAsArr[$indexOfMissingNumber] = '..';
        $progAsStr = implode(" ", $progAsArr);
        $gameData[] = ['question' => $progAsStr, 'correct answer' => strval($missingNumber)];
    }
        return $gameData;
}


function runProgression()
{
    $gameData = makeProgression();
    runCore($gameData, DESCRIPTION);
}
