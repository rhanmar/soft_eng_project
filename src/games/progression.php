<?php

namespace BrainGames\games\Progression;

use function BrainGames\Core\runCore;
use const BrainGames\Core\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function makeProgression($start, $diff, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $diff * $i;
    }
    return $progression;
}

function runProgression()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $diff = rand(1, 5); // common difference of successive members
        $start = rand(1, 10); // start member of arithmetic progression
        $progression = makeProgression($start, $diff, PROGRESSION_LENGTH);

        $missingElementIndex = rand(0, count($progression) - 1);
        $correctAnswer = $progression[$missingElementIndex];
        $progression[$missingElementIndex] = '..';
        $question = implode(" ", $progression);
        $gameData[] = [$question, strval($correctAnswer)];
    }

    runCore($gameData, DESCRIPTION);
}
