<?php

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

	public function GetBlindOptions()
	{
	    $sql = '
	        SELECT  BlindIncrementID, 
	                Length 
	        FROM    blindincrement 
	        WHERE   Status > 0
			ORDER BY Length
	    ';

	    $statement = $this->database->query($sql);
		return $statement->fetchAll(PDO::FETCH_ASSOC);	
	}

	public function GetBuyInOptions()
	{
	    $sql = '
	        SELECT  BuyinID, 
	                Amount, 
	                Bounty 
	        FROM    buyins 
	        WHERE   Status > 0
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
    
	function GetAvailablePlayers($gameID)
	{
	    $sql = '
	        SELECT  PlayerID, 
	                FirstName,
	                LastName
	        FROM    players
	        WHERE   PlayerID NOT IN (SELECT PlayerID FROM gameplayers WHERE GameID = :gameID)
	    ';
	          
	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameID', $gameID);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function UpsertGame($game)
	{
	    $sql;
	    if (empty($game['GameID']))
	    {
	        $sql = '
	            INSERT INTO games 
	                (Date, 
	                BlindIncrementID, 
	                BuyInID, 
	                BeginningStack)
	            VALUES 
	                (:date,
	                :blind,
	                :buyin,
	                :stack)
	            ';
		}
	    else
	    {
	        //Update where id blah blah..
	    }

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':date', $game['Date']);
		$statement->bindValue(':blind', $game['BlindIncrementID']);
		$statement->bindValue(':buyin', $game['BuyInID']);
		$statement->bindValue(':stack', $game['BeginningStack']);

		$statement->execute();
		$success = $statement->rowCount() === 1;

		return array('success' => $success);
	}
	
	function UpsertGamePlayer($player)
	{
	    $sql;
	    if (empty($player['PlayerID']))
	    {
	        $sql = '
	            INSERT INTO players 
	                (FirstName, 
	                LastName, 
	                Phone, 
	                Email)
	            VALUES 
	                (:fname,
	                :lname,
	                :phone,
	                :email)
	            ';

		    $statement = $this->database->prepare($sql);
			$statement->bindValue(':fname', $player['FirstName']);
			$statement->bindValue(':lname', $player['LastName']);
			$statement->bindValue(':phone', $player['Phone']);
			$statement->bindValue(':email', $player['Email']);
	
			$statement->execute();
			
			$player['PlayerID'] = $this->database->lastInsertId();
		}
		
		if (!empty($player['PlayerID']))
		{
			$sql = '
			    INSERT INTO gameplayers 
	                (GameID, 
	                PlayerID)
	            VALUES 
	                (:gameid,
	                :playerid)
	            ';
	
		    $statement = $this->database->prepare($sql);
			$statement->bindValue(':gameID', $player['GameID']);
			$statement->bindValue(':blind', $player['PlayerID']);
	
			$statement->execute();
			$success = $statement->rowCount() === 1;
		}
		else
		{
			$success = false;
		}

		return array('success' => $success);
	}

	function GetCurrentTime($game_id)
	{
		$sql = '
			SELECT TOP 1 
					Minutes, 
					Seconds
			FROM 	timervalues
			WHERE 	GameID = :gameID
			AND 	Status = 1
			ORDER BY TimerValueID DESC
			LIMIT 	1
		';
	          
	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameID', $game_id);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	function UpsertCurrentTime($data)
	{
		$sql = '
			UPDATE	timervalues
			SET		Status = 0
			WHERE	Status = 1
			
			INSERT INTO timervalues (
				GameID, 
				Minutes, 
				Seconds)
			VALUES (
				:gameid, 
				:min, 
				:sec)
		';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $data['game_id']);
		$statement->bindValue(':min', $data['min']);
		$statement->bindValue(':sec', $data['sec']);

		$result = array(
            "success" => $statement->execute(),
            "message" => $statement->errorCode()
	    );

		json_encode($result);
	}
}

?>