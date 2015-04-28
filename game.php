<html>
  <body>
    <?php
		include 'connection.php';
  
		$game = GetActiveGame($connection);

		$players;
		while ($game_data = mysql_fetch_assoc($game))
		{
			$players = GetPlayers($game_data['GameID']);
			$availablePlayers = GetAvailablePlayers($game_data['GameID']);

			$data = array(
						'game' => $game_data,
						'chips' => GetChips(),
						'blinds' => GetBlinds(),
						'players' => $players,
						'blindoptions' => GetBlindOptions(),
						'buyinoptions' => GetBuyinOptions(),
						'availableplayers' => $availablePlayers);
		}

		function GetActiveGame($connection)
		{
			$game_q = "SELECT GameID, Date, EndOfRebuy, BlindIncrementID, BuyInID
						FROM games
						WHERE Status = 1
						LIMIT 1";
                 
			$result = mysql_query($game_q, $connection) or die(mysql_error());
      
			return $result;
      }

      function GetChips()
      {
		    $chips_q = "SELECT ChipID ,PrimaryColor ,SecondaryColor ,Denomination ,ImageFilename FROM chips WHERE Status > 0";
		    $chips = mysql_query($chips_q);
      
        return $chips;
      }
    
      function GetBlinds()
      {
		    $blinds_q = "SELECT BlindID, SmallBlind, LargeBlind, ChipUpID, EndOfRebuy FROM blinds WHERE Status > 0";
		    $blinds = mysql_query($blinds_q);
      
        return $blinds;
      }
    
      function GetBlindOptions()
      {
		    $blind_dd_q = "SELECT BlindIncrementID, Length FROM blindincrement WHERE Status > 0";
		    $blind_dd = mysql_query($blind_dd_q);
      
			return $blind_dd;
      }
    
      function GetBuyInOptions()
      {
		    $buyins_q = "SELECT BuyinID, Amount, Bounty FROM buyins WHERE Status > 0 ORDER BY Bounty, Amount";
		    $buyins = mysql_query($buyins_q);
      
        return $buyins;
      }
    
      function GetPlayers($gameID)
      {
		    $players_q = "SELECT gp.PlayerID, 
                                FirstName,
                                (SELECT COUNT(*) FROM GamePlayerBuyin gbp WHERE gbp.GamePlayerID = gp.GamePlayerID) AS BuyinCount
                      FROM      players AS p 
                      JOIN      gameplayers AS gp ON gp.PlayerID = p.PlayerID
                      WHERE     gp.GameID = " . $gameID;
                  
		    $players = mysql_query($players_q);
      
        return $players;
      }
    
      function GetAvailablePlayers($gameID)
      {
		    $players_q = "SELECT PlayerID, 
                                FirstName,
								LastName
                      FROM      players
                      WHERE     PlayerID NOT IN (SELECT PlayerID FROM gameplayers WHERE GameID = " . $gameID . ")";
                  
		    $players = mysql_query($players_q);
      
        return $players;
      }
  
      function UpsertGame($game)
      {
        if (!empty($game['GameID']))
        {
      
        }
      }
    ?>
  </body>
</html>