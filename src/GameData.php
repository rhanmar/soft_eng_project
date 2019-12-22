<?php

namespace MindCoach;

class GameData
{
	private $description;
	private $roundsCount;
	private $complexity;
	private $randParams;
	private $gameName;
	private $gameData;


	public function getDescription()
	{
		return $this->description;
	}
	public function getRoundsCount()
	{
		return $this->roundsCount;
	}
	public function getRandParams()
	{
		return $this->randParams;
	}
	public function getGameName()
	{
		return $this->gameName;
	}
	public function getGameData()
	{
		return $this->gameData;
	}
	public function getComplexity()
	{
		return $this->complexity;
	}


	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function setRoundsCount($roundsCount)
	{
		$this->roundsCount = $roundsCount;
	}
	public function setRandParams($randParams)
	{
		$this->randParams = $randParams;
	}
	public function setGameName($gameName)
	{
		$this->gameName = $gameName;
	}
	public function setComplexity($complexity)
	{
		$this->complexity = $complexity;
	}
	public function setGameData($gameData)
	{
		$this->gameData = $gameData;
	}
}