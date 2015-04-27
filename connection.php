<html>
  <body>
    <?php
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$db = 'homegame';

		$connection = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($db);
    ?>
  </body>
</html>