<?php

require_once('connection.php');

$game = GetActiveGame($connection);

$players;
while ($game_data = mysql_fetch_array($game))
{
    $players = GetPlayers($game_data['GameID']);
}

$data = array(
	'chips' => GetChips(),
	'blinds' => GetBlinds(),
	'players' => $players
);

function GetActiveGame($connection)
{
    $game_q = '
    	SELECT 	GameID,
    			Date,
    			EndOfRebuy,
    			BlindIncrementID,
    			BuyInID
    	FROM 	games
    	WHERE 	Status = 1';
             
	$result = mysql_query($game_q, $connection) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
           
	$game = mysql_query($game_q);
  
	return $game;
}

function GetChips()
{
    $chips_q = '
    	SELECT 	ChipID,
    			PrimaryColor,
    			SecondaryColor,
    			Denomination,
    			ImageFilename
    	FROM 	chips
    	WHERE 	Status > 0';

    $chips = mysql_query($chips_q);
    return $chips;
}

function GetBlinds()
{
    $blinds_q = '
    	SELECT 	BlindID,
    			SmallBlind,
    			LargeBlind,
    			ChipUpID,
    			EndOfRebuy
    	FROM 	blinds
    	WHERE 	Status > 0';

    $blinds = mysql_query($blinds_q);
    return $blinds;
}

function GetPlayers($gameID)
{
    $players_q = "
    	SELECT 	gp.PlayerID, 
           		FirstName,
           		(SELECT COUNT(*) FROM GamePlayerBuyin gbp WHERE gbp.GamePlayerID = gp.GamePlayerID) AS BuyinCount
		FROM 	players AS p 
		JOIN 	gameplayers AS gp ON gp.PlayerID = p.PlayerID
		WHERE 	gp.GameID = {$gameID}";
	
	$players = mysql_query($players_q);
	return $players;
}

function UpsertGame($game)
{
	if (!empty($game['GameID']))
	{

	}
}

function GetEditGame($gameID)
{

}

?>