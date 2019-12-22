<?php

namespace MindCoach\games\Calc;

use function MindCoach\Core\runCore;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = ['+', '*', '-'];


function makeNumber($randParams) // create number
{
    $number = rand($randParams[0], $randParams[1]);
    return $number;
}


function findCorrectAnswer($number1, $number2, $operation)
{
    $correctAnswer = null;

    switch ($operation) {
        case '+':
            $correctAnswer = $number1 + $number2;
            break;
        case '*':
            $correctAnswer = $number1 * $number2;
            break;
        case '-':
            $correctAnswer = $number1 - $number2;
    }
    return $correctAnswer;
}


function runCalc($gameData)
{

    $roundsCount = $gameData->getRoundsCount();
    $randParams = $gameData->getRandParams();

    $result = [];

    for ($i = 0; $i < $roundsCount; $i++) {

        $number1 = makeNumber($randParams);
        $number2 = makeNumber($randParams);

        $operation = OPERATIONS[array_rand(OPERATIONS)];

        $correctAnswer = findCorrectAnswer($number1, $number2, $operation);

        $question = "{$number1} {$operation} {$number2}";

        $result[] = [$question, strval($correctAnswer)];
    }

    $gameData->setGameData($result);
    $gameData->setDescription(DESCRIPTION);

    runCore($gameData);

}
