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
	    	SELECT 	g.GameID,
	    			g.Date,
	    			g.EndOfRebuy,
	    			g.BlindIncrementID,
					g.BeginningStack,
	    			g.BuyInID,
					bi.Amount AS BuyInAmount
	    	FROM 	games AS g
			JOIN	buyins AS bi ON bi.BuyInID = g.BuyInID
	    	WHERE 	g.Status = 1
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
	    	SELECT 	b.BlindID,
	    			SmallBlind,
	    			LargeBlind,
	    			ChipUpID,
	    			EndOfRebuy,
					(SELECT EXISTS( SELECT * FROM completedblinds cb WHERE cb.BlindID = b.BlindID)) AS Completed
	    	FROM 	blinds b
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
					gp.GamePlayerID,
	           		FirstName,
					LastName,
	           		(SELECT COUNT(*) FROM GamePlayerBuyin gbp WHERE gbp.GamePlayerID = gp.GamePlayerID) AS BuyinCount,
					(SELECT pl.Code FROM placings AS pl JOIN playerplacings AS pp ON pp.PlacingID = pl.PlacingID WHERE pp.GamePlayerID = gp.GamePlayerID) AS Placing
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
			$success = $statement->rowCount() === 1;
			
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
			$statement->bindValue(':gameid', $player['GameID']);
			$statement->bindValue(':playerid', $player['PlayerID']);
	
			$statement->execute();
			$success = $statement->rowCount() === 1;
		}
		else
		{
			$success = false;
		}

		return array('success' => $success);
	}
	
	function UpsertBuyin($player)
	{
        $sql = '
            INSERT INTO gameplayerbuyin 
                (GamePlayerID, 
                IsRebuy)
            VALUES 
                (:gpid,
                :isrebuy)
            ';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gpid', $player['GamePlayerID']);
		$statement->bindValue(':isrebuy', $player['IsRebuy']);

		$statement->execute();
		$success = $statement->rowCount() === 1;

		return array('success' => $success);
	}
	
	function UpsertPlacing($data)
	{
        $sql = '
            INSERT INTO playerplacings 
                (GamePlayerID, 
                PlacingID)
            VALUES 
                (:gpid,
                :placingid)
            ';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gpid', $data['GamePlayerID']);
		$placing = $this->GetNextPlacing($data);
		$statement->bindValue(':placingid', $placing['PlacingID']);

		$statement->execute();
		$success = $statement->rowCount() === 1;

		return array('success' => $success);
	}

	function GetNextPlacing($game)
	{
		$sql = "
			SELECT COUNT(*) AS Count
			FROM gameplayers 
			WHERE GameID = :gameid
		";
	          
	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $game['GameID']);
		$statement->execute();
		# TODO: return id only, no array, and call GetNextPlacing directly from bindValue
		$players = $statement->fetch(PDO::FETCH_ASSOC);
		
		$sql = "
			SELECT 	PlacingID
			FROM 	placings p
			WHERE 	p.PlaceValue <= :count
			AND		p.PlacingID NOT IN (
				SELECT 	pp.PlacingID 
				FROM 	playerplacings pp 
				JOIN	gamePlayers AS gp ON gp.GamePlayerID = pp.GamePlayerID
				WHERE 	gp.GameID = :gameid)
			AND 	Status = 1
			AND		p.PlaceValue IS NOT NULL
			ORDER BY p.PlaceValue DESC
			LIMIT	1
		";
	          
	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $game['GameID']);
		$statement->bindValue(':count', $players['Count']);
		$statement->execute();
		# TODO: return id only, no array, and call GetNextPlacing directly from bindValue
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	function GetCurrentTime($game)
	{
		$sql = '
			SELECT 	Minutes, 
					Seconds
			FROM 	timervalues
			WHERE 	GameID = :gameid
			AND 	Status = 1
			ORDER BY TimerValueID DESC
			LIMIT	1
		';
	          
	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $game['GameID']);
		$statement->execute();
		$success = $statement->fetch(PDO::FETCH_ASSOC);
		
		if (!$success || $success == false)
		{
			$sql = '
				SELECT 	Length AS Minutes, 
						0 AS Seconds
				FROM 	blindincrement
				WHERE 	BlindIncrementID = :biid
				LIMIT	1
			';
		          
		    $statement = $this->database->prepare($sql);
			$statement->bindValue(':biid', $game['BlindIncrementID']);
			$statement->execute();
			$success = $statement->fetch(PDO::FETCH_ASSOC);
		}
		else
		{
			$game['gameid'] = $game['GameID'];
			$this->ClearSavedTime($game);
		}
		
		return $success;
	}

	function UpsertCurrentTime($data)
	{
		$this->ClearSavedTime($data);
			
		$sql = '
			INSERT INTO timervalues 
				(GameID, 
				Minutes, 
				Seconds)
			VALUES 
				(:gameid, 
				:min, 
				:sec)
		';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $data['gameid']);
		$statement->bindValue(':min', $data['min']);
		$statement->bindValue(':sec', $data['sec']);

		$result = array(
            "success" => $statement->execute(),
            "message" => $statement->errorCode()
	    );

		json_encode($result);
	}

	function ClearSavedTime($data)
	{
		$sql = '
			UPDATE	timervalues
			SET		Status = 0
			WHERE	Status = 1
			AND		GameID = :gameid
		';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':gameid', $data['gameid']);

		$result = array(
            "success" => $statement->execute(),
            "message" => $statement->errorCode()
	    );

		json_encode($result);
	}
	
	function UpsertEndBlind($blind)
	{
        $sql = '
            INSERT INTO completedblinds 
                (BlindID, 
                GameID)
            VALUES 
                (:blindid,
                :gameid)
            ';

	    $statement = $this->database->prepare($sql);
		$statement->bindValue(':blindid', $blind['BlindID']);
		$statement->bindValue(':gameid', $blind['GameID']);

		$result = array(
            "success" => $statement->execute(),
            "message" => $statement->errorCode()
	    );
	}
}

?>