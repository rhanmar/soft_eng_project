<?php

namespace MindCoach\games\Even;

use function MindCoach\Core\runCore;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"';

function isEven($number)
{
    return ($number % 2 === 0);
}

function runEven($gameData)
{
	$roundsCount = $gameData->getRoundsCount();
    $randParams = $gameData->getRandParams();

    $result = [];

    for ($i = 0; $i < $roundsCount; $i++) {

        $question = rand($randParams[0], $randParams[1]);

        $correctAnswer = isEven($question) ? 'yes' : 'no';
        
        $result[] = [$question, $correctAnswer];
    }
    
    $gameData->setGameData($result);
    $gameData->setDescription(DESCRIPTION);

    runCore($gameData);
}
