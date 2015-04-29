<?php
	include 'connection.php';
	include 'game.php';

	$data = json_decode($_POST['data'], TRUE);

	$sql = "INSERT INTO games (Date, BlindIncrementID, BuyInID, BeginningStack)
			VALUES (" . $data['Date'] . ", " . $data['BlindIncrementID'] . ", " . $data['BuyInID'] . ", " . $data['BeginningStack'] . ")";
		
	if (mysql_query($sql, $connection)) {
		$result = array(
			"success" => 'true',
			"message" => '',
		);
	} else {
		$result = array(
			"success" => 'false',
			"message" => mysql_error($connection),
		);
	}

	print json_encode($result);
	?>