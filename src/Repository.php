<?php

require_once('connection.php');

class Repository
{
	private $database = null;

	public function __construct()
	{
		$this->CreateDatabaseConnection();
	}

	private function CreateDatabaseConnection()
	{
		$this->database = new PDO(
			'mysql:host=localhost;dbname=homegame;charset=utf8',
			'root',		// user
			''			// password
		);

		$this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	}

	public function GetActiveGame()
	{
		$sql = '
	    	SELECT 	GameID,
	    			Date,
	    			EndOfRebuy,
	    			BlindIncrementID,
	    			BuyInID
	    	FROM 	games
	    	WHERE 	Status = 1
	    	LIMIT 	1
	    ';

		$statement = $this->database->query($sql);
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public function GetChips()
	{
		$sql = '
	    	SELECT 	ChipID,
	    			PrimaryColor,
	    			SecondaryColor,
	    			Denomination,
	    			ImageFilename
	    	FROM 	chips
	    	WHERE 	Status > 0
		';

		$statement = $this->database->query($sql);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function GetBlinds()
	{
		$sql = '
	    	SELECT 	BlindID,
	    			SmallBlind,
	    			LargeBlind,
	    			ChipUpID,
	    			EndOfRebuy
	    	FROM 	blinds
	    	WHERE 	Status > 0
		';

		$statement = $this->database->query($sql);
		return $statement->fetchAll(PDO::FETCH_ASSOC);		
	}

	public function GetPlayers($gameID)
	{
		$sql = '
	    	SELECT 	gp.PlayerID, 
	           		FirstName,
	           		(SELECT COUNT(*) FROM GamePlayerBuyin gbp WHERE gbp.GamePlayerID = gp.GamePlayerID) AS BuyinCount
			FROM 	players AS p 
			JOIN 	gameplayers AS gp ON gp.PlayerID = p.PlayerID
			WHERE 	gp.GameID = :gameID
		';

		$statement = $this->database->prepare($sql);
		$statement->bindValue(':gameID', $gameID);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}	
}

?>