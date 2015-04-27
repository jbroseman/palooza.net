<html>
    <head>
        <title>HomeGame - Dashboard</title>
        <link rel="stylesheet" href="styles/font.css" type="text/css" />
        <link rel="stylesheet" href="styles/site.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/timer.js"></script>
		<script type="text/javascript" src="scripts/socket.js"></script>
    </head>
    <body>
	<?php
		include 'connection.php';
		include 'game.php';
		include 'timer.php';
	?>
        <div class="header plaque">
            <div class="bevel">
                <div class="header-text">Skinz's</div>
				<div class="header-text2">PokerPalooza</div>
            </div>
        </div>
        <div id="body">
			<div class="players">
				<ul>
					<?php
						while ($player = mysql_fetch_array($data['players']))
						{
							$show_player = "<li class='paidx{$player['BuyinCount']}'><span>{$player['FirstName']}</span>";
							for ($inx = $player['BuyinCount']; $inx > 1; $inx --)
							{
								$show_player .= "<div class='rebuy'>";
								$show_player .= "<img src='img/1up_chip.png' alt='rebuy chip' />";
								$show_player .= "</div>";
							}
							$show_player .= "</li>";
							echo $show_player;
						}
					 ?>
				</ul>
			</div>
				<?php
					while($gamedata = mysql_fetch_assoc($game))
					{
						$show_game = "<div class='game' data-id='{$gamedata['GameID']}' data-blind='{$gamedata['BlindIncrementID']}' data-buyin='{$gamedata['BuyInID']}'>";
						$show_game .= "<div class='timer'>{$gamedata['GameID']}</div>";
						$show_game .= "</div>";

						echo $show_game;
					}
				 ?>
			<div class="timer">
				<audio id="siren" src="siren_noise.wav" controls preload="auto" autobuffer></audio>
				<table>
					<tbody>
						<tr class="display">
							<td class="first"><span class="minutes"></span></td>
							<td><span class="separator">:</span></td>
							<td class="last"><span class="seconds"></span></td>
						</tr>
						<tr class="control">
							<td class="first"><div class='button' id="start_timer">Start</div></td>
							<td><div class='button' id="stop_timer">Stop</div></td>
							<td class="last"><div class='button' id="clear_timer">Clear</div></td>
						</tr>
					</tbody>
				</table>
			</div>
            <div class="blinds">
                <ul>
				<?php
					while ($blind = mysql_fetch_array($data['blinds']))
					{
						$show_blind = "<li class='end-of-rebuy-{$blind['EndOfRebuy']}'><span>{$blind['SmallBlind']}/{$blind['LargeBlind']}</span>";
						$show_blind .= "<div class='finished'></div></li>";
						echo $show_blind;
					}
				?>
                </ul>
            </div> 
            <div class="chip-values plaque">
				<div class="bevel">
					<?php
						while ($chip = mysql_fetch_array($data['chips']))
						{
							$show_chip = "<div class='item'>";
							$show_chip .= "<span>{$chip['Denomination']}</span>";
							$show_chip .= "<img src='img/{$chip['ImageFilename']}' alt='{$chip['PrimaryColor']} chip, {$chip['Denomination']} units' />";
							$show_chip .= "</div>";
							echo $show_chip;
						}
					?>
				</div>
            </div>
            <section class="content-wrapper main-content clear-fix">
            </section>
        </div>
        <footer>
            <div class="content-wrapper">
                <div>
                    <p>&copy; 2015 - HomeGame - Jaime B.</p>
                </div>
            </div>
        </footer>
		<div class="popup-new-game hidden">
			<form action="newgame.php" method="post">
				<div class="form-field">
					<Select name="BuyinID"></select> //Select buy in
					<Select name="BlindID"></select> //Select blind rate
					<input type="text" name="BeginningStack" />
				</div>
				<div class="button-wrapper">
					<input type="submit" />
				</div>
			</form>
		</div>
		<div class="popup-add-player hidden">
			<form action="addplayer.php" method="post">
				<div class="form-field">
					<Select></select> //Select players not in game
					<label for="name">Name</label>
					<input id="name" name="name" type="text" value="" />
					<label for="phone">Name</label>
					<input id="phone" name="phone" type="text" value="" />
					<label for="email">Email</label>
					<input id="email" name="email" type="text" value="" />
				</div>
				<div class="button-wrapper">
					<input type="submit" value="Send" />
				</div>
			</form>
		</div>
    </body>
</html>
