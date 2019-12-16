<?php

namespace BrainGames\Tests;

use PHPUnit\Framework\TestCase;

use function BrainGames\games\Calc\findCorrectAnswer;
use function BrainGames\games\Gcd\findGcd;

use function BrainGames\Starter\prepareForStart;


class BrainGamesTest extends TestCase
{
	// White box test
	public function testCalc()
	{
		$answer = findCorrectAnswer(10, 80,'+');
		$this->assertEquals(90, $answer);

		$answer = findCorrectAnswer(10, 80, '-');
		$this->assertEquals(-70, $answer);

		$answer = findCorrectAnswer(10, 80, '*');
		$this->assertEquals(800, $answer);

	}

	public function testGcd()
	{
		$answer = findGcd(100, 2);
		$this->assertEquals(2, $answer);

		$answer = findGcd(111, 4);
		$this->assertEquals(1, $answer);

		$answer = findGcd(45, 5);
		$this->assertEquals(5, $answer);

	}

	// Black box test
	public function testRun()
	{		
		prepareForStart();
		$this->assertEquals(1,1);
	}

}