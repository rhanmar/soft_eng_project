<?php

namespace BrainGames\games\Calc;

use function BrainGames\Core\runCore;
use const BrainGames\Core\NUMBER_OF_ROUNDS;

const DESCRIPTION = "What is the result of the expression?";
const MIN = 1;
const MAX = 100;
const ARRAY_OF_OPERANDS = ['+', '*'];

function runCalc()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);
        $operand = ARRAY_OF_OPERANDS[array_rand(ARRAY_OF_OPERANDS)];

        $correctAnswer = null;

        switch ($operand) {
            case '+':
                $correctAnswer = $number1 + $number2;
                break;
            case '*':
                $correctAnswer = $number1 * $number2;
                break;
        }
        $expression = "{$number1} {$operand} {$number2}";

        $gameData[] = ['question' => $expression, 'correct answer' => strval($correctAnswer)];
    }
    runCore($gameData, DESCRIPTION);
}
