<html>
  <body>
    <?php
		include 'connection.php';

		function GetCurrentTime($game_id)
		{
			$time_q = "SELECT TOP 1 Minutes, Seconds
						FROM timervalues
						WHERE GameID = $game_id
						AND Status = 1
						ORDER BY TimerValueID DESC";
                 
			$result = mysql_query($time_q, $connection) or die(mysql_error());
			$row = mysql_fetch_assoc($result);
               
			$time = mysql_query($time_q);
      
			return $time;
		}

		function UpsertCurrentTime($game_id, $min, $sec)
		{
			$row = "INSERT INTO timervalues (GameID, Minutes, Seconds)
			VALUES ($game_id, $min, $seconds)";

			if (mysql_query($row, $connection)) {
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
		}
    ?>
  </body>
</html>