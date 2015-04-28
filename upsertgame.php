<html>
  <body>
    <?php
		include 'connection.php';
		include 'game.php';

		$date = $_POST['Date'];
		$buyin = $_POST['BuyinID'];
		$blind = $_POST['BlindIncrementID'];
		$stack = $_POST['BeginningStack'];

		$sql = "INSERT INTO games (Date, BlindIncrementID, BuyInID, BeginningStack)
				VALUES ('$date', '$blind', '$buyin', '$stack')";
		
		if (mysql_query($sql, $connection)) {
			$result = array(
				"success" => 'true',
				"message" => '',
			);
		} else {
			$result = array(
				"success" => 'false',
				"message" => mysql_error($conn),
			);
		}

		print json_encode($result);
    ?>
  </body>
</html>