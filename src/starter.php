<?php

namespace MindCoach\Starter;

use function MindCoach\games\Calc\runCalc;
use function MindCoach\games\Even\runEven;
use function MindCoach\games\Gcd\runGcd;
use function MindCoach\games\Prime\runPrime;
use function MindCoach\games\Progression\runProgression;

use const MindCoach\games\Calc\DESCRIPTION as d1;
use const MindCoach\games\Even\DESCRIPTION as d2;
use const MindCoach\games\Gcd\DESCRIPTION as d3;
use const MindCoach\games\Prime\DESCRIPTION as d4;
use const MindCoach\games\Progression\DESCRIPTION as d5;

use function \cli\line;
//use function \cli\prompt;

use MindCoach\GameData; // get a way to object


function showGames()
{
	line("Choose game:");
	line("1 - calculator");
	line(d1);
	line();
	line("2 - even");
	line(d2);
	line();
	line("3 - gcd");
	line(d3);
	line();
	line("4 - prime");
	line(d4);
	line();
	line("5 - progression");
	line(d5);
	line();

}

function makeRandParams($complexity)
{
	switch ($complexity) {
		case 1:
			return [1,10];
			break;
		case 2:
			return [1,100];
			break;
		case 3:
			return [-100, 100];
			break;
	}
}

function chooseGame()
{	
	showGames(); // show list of games

	// Choose number of game
	$game = readline();
	if ((int)$game > 5 || (int)$game === 0) {
		$game = 1;
	}
	if (strlen($game) == 0) {
		$game = 1;
	}

	// Get game name by number
	switch ((int)$game) {
		case 1:
			$game = "calc";
			break;
		case 2:
			$game = "even";
			break;
		case 3:
			$game = "gcd";
			break;
		case 4:
			$game = "prime";
			break;
		case 5:
			$game = "progression";
			break;						
	}
	return $game;
}


function chooseRoundsCount()
{
	line("Choose Rounds Count: ");
	$roundsCount = readline();
	if (strlen($roundsCount) == 0) {
		$roundsCount = 3;
	}
	if ((int)$roundsCount <= 0) {
		$roundsCount = 3;
	}
	return (int)$roundsCount;
}


function chooseGameComplexity()
{
	line("Choose game complexity:");
	line("1 - easy");
	line("2 - normal");
	line("3 - hard");
	$complexity = readline();
	if ((int)$complexity > 3 || (int)$complexity === 0) {
		$complexity = 2;
	}
	if ((int)($complexity) <= 0) {
		$complexity = 2;
	}
	return (int)$complexity;
}


function start($gameData)
{
	$gameName = $gameData->getGameName();

	$games = [
		'calc' => function ($gameData) {
			return runCalc($gameData);
		},
		'even' => function ($gameData) {
			return runEven($gameData);
		},
		'gcd' => function ($gameData) {
			return runGcd($gameData);
		},
		'prime' => function ($gameData) {
			return runPrime($gameData);
		},
		'progression' => function ($gameData) {
			return runProgression($gameData);
		}		
	];
	return $games[$gameName]($gameData);
}


function prepareForStart()
{
	$gameData = new GameData();	// create an object to store data about game

	line();
	line("Welcome!");
	line();

	// Get data about game
	$gameName = chooseGame();
	$roundsCount = chooseRoundsCount();
	$complexity = chooseGameComplexity();
	$randParams = makeRandParams($complexity);

	// Set data about game in the object
	$gameData->setGameName($gameName);
	$gameData->setRoundsCount($roundsCount);
	$gameData->setRandParams($randParams);
	$gameData->setComplexity($complexity);
	
	// Start the app
	start($gameData);
}