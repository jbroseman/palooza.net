<html>
    <head>
        <title>HomeGame - Dashboard</title>
        <link rel="stylesheet" href="styles/font.css" type="text/css" />
        <link rel="stylesheet" href="styles/site.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/game.js"></script>
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
			<form action="upsertgame.php" method="post">
				<div class="form-field">
					<label for="Date">Date</label>
					<input type="text" name="Date" />
				</div>
				<div class="form-field">
					<label for="BuyinID">Buy-in</label>
					<Select name="BuyinID">
						while ($amount = mysql_fetch_array($data['buyinoptions']))
						{
							$selected_buyin = null;

							while($gamedata = mysql_fetch_assoc($game))
							{
								$selected_buyin = $gamedata['BuyInID'];
							}

							$show_buyin_options = "<option value='{$amount['BuyinID']}'";

							if ($selected_buyin == $amount['BuyinID'])
							{
								$show_buyin_options .= " selected = 'selected'";
							}

							$show_buyin_options .= ">${$amount['Amount']}";

							if ($Amount['Bounty'] > 0)
							{
								$show_buyin_options .= " + ${$Amount['Bounty']} bounty";
							}

							$show_buyin_options .= "</option>";
							
							echo $show_buyin_options;
						}
					</select>
				</div>
				<div class="form-field">
					<label for="BlindIncrementID">Blinds</label>
					<Select name="BlindIncrementID">
						while ($increment = mysql_fetch_array($data['blindoptions']))
						{
							$selected_blind_increment = null;

							while($gamedata = mysql_fetch_assoc($game))
							{
								$selected_blind_increment = $gamedata['BlindIncrementID'];
							}

							$show_blind_options = "<option value='{$increment['BlindIncrementID']}'";

							if ($selected_blind_increment == $increment['BlindIncrementID'])
							{
								$show_blind_options .= " selected = 'selected'";
							}

							$show_buyin_options .= ">{$increment['Length']} minutes</option>";
							
							echo $show_blind_options;
						}
					</select>
				</div>
				<div class="form-field">
					<label for="BeginningStack">Beginning Stack</label>
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
					<Select>
						<option value='0'></option>
						while ($player = mysql_fetch_array($data['availableplayers']))
						{
							$show_player = "<option value='{$player['PlayerID']}'>{$player['FirstName']} {$player['LastName']}</option>";
							
							echo $show_player;
						}
					</select>
					<label for="Firstname">First Name</label>
					<input id="FirstName" name="FirstName" type="text" value="" />
					<label for="LastName">Last Name</label>
					<input id="LastName" name="LastName" type="text" value="" />
					<label for="Phone">Phone</label>
					<input id="Phone" name="Phone" type="text" value="" />
					<label for="Email">Email</label>
					<input id="Email" name="Email" type="text" value="" />
				</div>
				<div class="button-wrapper">
					<input type="submit" value="Send" />
				</div>
			</form>
		</div>
    </body>
</html>
