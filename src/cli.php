<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Even\play;

require __DIR__ . '/../vendor/autoload.php';

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"';

function run()
{
    line('Welcome to the Brain Games!');
    line(DESCRIPTION);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    for ($i = 0; $i < 3; $i++) {
    	line(DESCRIPTION);
    	$tmp = play();
    	[$number, $correctAnswer] = $tmp;
    	line("Question: %u", $number);
    	$answer = prompt('Your answer: ');
    	if ($answer === $correctAnswer) {
    		line("Correct!");
    	} else {
    		line('"%s" is wrong answer ;( Correct answer was "%s"', $answer, $correctAnswer);
    		line("Let's try again, %s", $name);
    	}
    	print_r("\n");
    }

    line("Congratulations, %s!", $name);
    return;
}
//run();

