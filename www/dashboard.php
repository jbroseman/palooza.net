<?php

require_once('../src/Repository.php');

$repo = new Repository();
$game = $repo->GetActiveGame();
$timer = $repo->GetCurrentTime($game);

?>

<html>
    <head>
        <title>HomeGame - Dashboard</title>
        <link rel="stylesheet" href="styles/font.css" type="text/css" />
        <link rel="stylesheet" href="styles/site.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/game.js"></script>
		<script type="text/javascript" src="scripts/timer.js"></script>
    </head>
    <body>
        <div class="header plaque">
            <div class="bevel">
                <div class="header-text">Skinz's</div>
				<div class="header-text2">PokerPalooza</div>
            </div>
        </div>
        <div id="body">
			<div class="players">
				<div class="button" id="Add_Player">Add</div>
				<ul>
				<?php foreach ($repo->GetPlayers($game['GameID']) as $player) { ?>
					<li class='paidx<?=$player['BuyinCount']?>' data-id='<?=$player['PlayerID']?>' data-gameplayerid='<?=$player['GamePlayerID']?>' data-name='<?=$player['FirstName']?> <?=$player['LastName']?>'>
						<span><?=$player['FirstName']?></span>
					
						<?php for ($inx = $player['BuyinCount']; $inx > 1; $inx--) { ?>
							<div class='rebuy'>
								<img src='img/1up_chip.png' alt='rebuy chip' />
							</div>
						<?php } ?>
						
						<div class="placing"><?=$player['Placing']?></div>
						
						<div class="player-menu hidden">
							<div>
								<h2></h2>
								<?php if ($player['BuyinCount'] > 0) { ?>
									<div class="button" id="Button_Rebuy">Rebuy</div>
									<?php if (empty($player['Placing'])) { ?>
										<div class="button" id="Button_Place">Place</div>
									<?php } ?>
									<div class="button disabled" title="this feature is under construction" id="Button_Refund">Refund</div>
								<?php } else { ?>
									<div class="button" id="Button_Buy_In">Buy In</div>
									<div class="button" id="Button_Remove_Player">Remove</div>
								<?php } ?>
								<?php if (!empty($game['GameID']) && $game['GameID'] > 0) { ?>
									<div class="button player-menu-collapse">Close</div>
								<?php } ?>
							</div>
						</div>
					</li>

				<?php }	?>
				</ul>
			</div>
			<div class="game" data-id="<?=$game['GameID']?>" data-blind="<?=$game['BlindIncrementID']?>" data-buyin="<?=$game['BuyInID']?>">
			</div>
			<div class="timer">
				<audio id="siren" src="sounds/siren_noise.wav" controls preload="auto" autobuffer></audio>
				<table>
					<tbody>
						<tr class="display">
							<td class="first"><span class="minutes"><?=$timer['Minutes']?></span></td>
							<td><span class="separator">:</span></td>
							<td class="last"><span class="seconds"><?=$timer['Seconds']?></span></td>
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
                <?php foreach ($repo->GetBlinds() as $blind) { ?>
					<li class="end-of-rebuy-<?=$blind['EndOfRebuy']?> completed-<?=$blind['Completed']?>" data-id="<?=$blind['BlindID']?>"><span><?=$blind['SmallBlind']?>/<?=$blind['LargeBlind']?></span>
						<div class="status"></div>
					</li>
                <?php } ?>
                </ul>
            </div> 
            <div class="chip-values plaque">
				<div class="bevel">
					<?php foreach ($repo->GetChips() as $chip) { ?>
						<div class="item">
							<span><?=$chip['Denomination']?></span>
							<img src="img/<?=$chip['ImageFilename']?>" alt="<?=$chip['PrimaryColor']?> chip, <?=$chip['Denomination']?> units" />
						</div>
					<?php } ?>
				</div>
            </div>
        </div>
        <footer>
            <div class="content-wrapper">
                <div>
                    <p>&copy; 2015 - PokerPalooza</p>
                </div>
            </div>
        </footer>
		<div id="Modal_Overlay" class="hidden"></div>
		<div id="Menu_Expand">MAIN MENU</div>
		<div class="popup main-menu plaque hidden">
			<div class="bevel">
				<?php if (empty($game['GameID']) || $game['GameID'] == 0) { ?>
					<div class="button" id="New_Game">New Game</div>
				<?php } else { ?>
					<div class="button disabled" title="Game Running" id="New_Game">New Game</div>
				<?php } ?>
				<div class="button disabled" title="this feature is under construction" id="Stats">Statistics</div>
				<?php if (!empty($game['GameID']) && $game['GameID'] > 0) { ?>
					<div class="button menu-collapse">Back to Game</div>
				<?php } ?>
			</div>
		</div>
		<div class="popup new-game plaque hidden">
			<div class="bevel">
				<form id="Upsert_Game" method="post">
					<div class="form-field">
						<label for="Date">Date</label>
						<input type="date" name="Date" id="Date" />
					</div>
					<div class="form-field">
						<label for="BuyinID">Buy-in</label>
						<select id="BuyinID" name="BuyinID">
						<?php
							foreach ($repo->GetBuyInOptions() as $option) 
							{ 
								$selected = '';							
								
								if ($option['BuyinID'] == $game['BuyInID']) 
								{
									$selected = 'selected';
								}
	
								if (!empty($option['Bounty']) && $option['Bounty'] > 0)
								{
									$text = "{$option['Amount']} {$option['Bounty']}";
								}
								else
								{
									$text = $option['Amount'];
								}
						?>
							<option value="<?=$option['BuyinID']?>" <?=$selected?>>
								<?=$text?>
							</option>
		                <?php
		                	}
		                ?>
						</select>
					</div>
					<div class="form-field">
						<label for="BlindIncrementID">Blinds</label>
						<Select id="BlindIncrementID" name="BlindIncrementID">
							<?php 
							$selected = 'false';
							foreach ($repo->GetBlindOptions() as $option) 
							{ 
								if ($option['BlindIncrementID'] == $game['BlindIncrementID']) 
								{
									$selected = 'selected';
								}
							?>
								<option value='<?=$option['BlindIncrementID']?>' selected='<?=$option['BlindIncrementID']==$game['BlindIncrementID']?>'>
									<?=$option['Length']?> minutes
								</option>
			                <?php } ?>
						</select>
					</div>
					<div class="form-field">
						<label for="BeginningStack">Beginning Stack</label>
						<input type="text" name="BeginningStack" id="BeginningStack" />
					</div>
					<div class="button-wrapper">
						<div id="Button_Upsert_Game" class="button">Submit</div>
						<div id="Button_Cancel_Upsert_Game" class="button">Cancel</div>
					</div>
				</form>
			</div>
		</div>
		<div class="popup add-player plaque hidden">
			<div class="bevel">
				<form id="Upsert_Player" action="addplayer.php" method="post">
					<input type="hidden" name="GameID" id="GameID" value="<?=$game['GameID']?>" />
					<div class="form-field">
						<label for="PlayerID">Players</label>
						<?php
							$players = $repo->GetAvailablePlayers($game['GameID']);
							if (count($players) === 0) {
						?>
						
						<select disabled="disabled" name="PlayerID" id="PlayerID">
							<option value='0'>Add a new player</option>
						</select>
	
						<?php } else { ?>
						
						<select name="PlayerID" id="PlayerID">
							<option value='0'>Create New</option>
								
							<?php foreach ($players as $player) { ?>
							
							<option value='<?=$player['PlayerID']?>'><?=$player['FirstName']?> <?=$player['LastName']?></option>
							
							<?php } ?>
							
						</select>
						<?php } ?>
					</div>
					<div class="form-field">
						<label for="Firstname">First Name</label>
						<input id="FirstName" name="FirstName" type="text" value="" />
					</div>
					<div class="form-field">
						<label for="LastName">Last Name</label>
						<input id="LastName" name="LastName" type="text" value="" />
					</div>
					<div class="form-field">
						<label for="Phone">Phone</label>
						<input id="Phone" name="Phone" type="text" value="" />
					</div>
					<div class="form-field">
						<label for="Email">Email</label>
						<input id="Email" name="Email" type="text" value="" />
					</div>
					<div class="button-wrapper">
						<div id="Button_Upsert_Player" class="button">Submit</div>
						<div id="Button_Cancel_Upsert_Player" class="button">Cancel</div>
					</div>
				</form>
			</div>
		</div>
    </body>
</html>
