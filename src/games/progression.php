<?php

namespace BrainGames\games\Progression;

use function BrainGames\Core\runCore;
use const BrainGames\Core\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;

function makeProgression()
{
    $gameData = [];

    $diff = rand(1, 5); // common difference of successive members
    $start = rand(1, 10); // start member of arithmetic progression
    $progression = []; // arithmetic progression

    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
            $progression[] = $start + $diff * $i;
    }
        return $progression;
}


function runProgression()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $progression = makeProgression();

        $missingIndex = rand(0, count($progression) - 1);
        $missingElement = $progression[$missingIndex];
        $progression[$missingIndex] = '..';
        $question = implode(" ", $progression);
        $gameData[] = [$question, strval($missingElement)];
    }

    runCore($gameData, DESCRIPTION);
}
