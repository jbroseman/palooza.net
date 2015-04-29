<html>
  <body>
    <?php
		include 'connection.php';
		include 'timer.php';

		$game_id = $_GET['gameid'];
		$min = $_GET['min'];
		$sec = $_GET['sec'];

		$result = UpsertCurrentTime($game_id, $min, $sec);

		print json_encode($result);
    ?>
  </body>
</html>