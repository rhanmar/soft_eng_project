<?php

namespace BrainGames\games\Calc;

use function BrainGames\Core\runCore;
use const BrainGames\Core\ROUNDS_COUNT;

const DESCRIPTION = "What is the result of the expression?";
const MIN = 1;
const MAX = 100;
const OPERANDS = ['+', '*'];

function runCalc()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number1 = rand(MIN, MAX);
        $number2 = rand(MIN, MAX);
        $operand = OPERANDS[array_rand(OPERANDS)];

        $correctAnswer = null;

        switch ($operand) {
            case '+':
                $correctAnswer = $number1 + $number2;
                break;
            case '*':
                $correctAnswer = $number1 * $number2;
                break;
        }
        $question = "{$number1} {$operand} {$number2}";

        $gameData[] = [$question, strval($correctAnswer)];
    }
    runCore($gameData, DESCRIPTION);
}
