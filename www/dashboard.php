<?php

require_once('../src/Repository.php');

$repo = new Repository();
$game = $repo->GetActiveGame();
$themes = $repo->GetThemes();
$timer = $repo->GetCurrentTime($game);
$blinds = $repo->GetBlinds($game['GameID']);
$chips = $repo->GetChips();
$players = $repo->GetPlayers($game['GameID']);
$activeplayercount = 0;
foreach ($players as $player) {
	if (!isset($player['Placing'])) {
		$activeplayercount ++;
	}
}
$buyincount = 0;
$bumpcount = 0;
$completedblinds = 0;

?>

<html>
    <head>
        <title>HomeGame - Dashboard</title>
        <link rel="stylesheet" href="styles/font.css" type="text/css" />
        <link rel="stylesheet" href="styles/<?=$game['Theme']?>.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/timer.js"></script>
		<script type="text/javascript" src="scripts/game.js"></script>
		<script type="text/javascript" src="scripts/players.js"></script>
    </head>
    <body>
        <div class="header plaque">
            <div class="bevel">
                <div class="header-text">Skinz's</div>
				<div class="header-text2">PokerPalooza</div>
            </div>
        </div>
        <div id="body">
			<?php include ('players.php'); ?>
			<?php include ('blinds.php'); ?>
			<?php include ('chip-legend.php'); ?>
			<?php include ('game.php'); ?>
			<?php include ('timer.php'); ?>
        </div>
        <footer>
	        <p>&copy; 2015 - PokerPalooza</p>
        </footer>
		<div id="Modal_Overlay" class="hidden"></div>
		<div id="Menu_Expand">MAIN MENU</div>
		<?php include ('popup-main-menu.php'); ?>
		<?php include ('popup-new-game.php'); ?>
		<?php include ('popup-add-player.php'); ?>
		<?php include ('popup-add-players.php'); ?>
		<?php include ('popup-set-payouts.php'); ?>
    </body>
</html>
