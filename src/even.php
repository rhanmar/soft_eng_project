<?php

namespace BrainGames\Even;

//use function \BrainGames\Cli\run;

//require __DIR__ . '/../vendor/autoload.php';

function isEven($number)
{
	return ($number % 2 === 0) ? true : false;
}

function play ()
{
	$number = rand(0, 100);
	$correctAnswer = isEven($number) ? 'yes' : 'no';
	return [$number, $correctAnswer];
}
