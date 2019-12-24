<?php

namespace MindCoach\games\Progression;

use function MindCoach\Core\runCore;

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

function runProgression($gameData)
{
    $randParams = $gameData->getRandParams();

    $result = [];

    for ($i = 0; $i < $gameData->getRoundsCount(); $i++) {
        $diff = rand($randParams[0], $randParams[1]); // common difference of successive members
        $start = rand($randParams[0], $randParams[1]); // start member of arithmetic progression

        $progression = makeProgression($start, $diff, PROGRESSION_LENGTH);

        $missingElementIndex = rand(0, count($progression) - 1);

        $correctAnswer = $progression[$missingElementIndex];

        $progression[$missingElementIndex] = '..';

        $question = implode(" ", $progression);
        
        $result[] = [$question, strval($correctAnswer)];
    }

    $gameData->setGameData($result);
    $gameData->setDescription(DESCRIPTION);

    runCore($gameData);
}
