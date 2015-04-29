<?php

require_once('../src/Repository.php');

$repo = new Repository();
$game = $repo->GetActiveGame();

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
			<div class="main-menu">
				<div class="button" id="New_Game">New Game</div>
				<div class="button" id="Add_Player">Add Player</div>
			</div>
			<div class="players">
				<ul>
				<?php foreach ($repo->GetPlayers($game['GameID']) as $player) { ?>
					
					<li class='paidx<?=$player['BuyinCount']?>'>
						<span><?=$player['FirstName']?></span>
					
						<?php for ($inx = $player['BuyinCount']; $inx > 1; $inx--) { ?>
							<div class='rebuy'>
								<img src='img/1up_chip.png' alt='rebuy chip' />
							</div>
						<?php } ?>
					</li>

				<?php }	?>
				</ul>
			</div>
			<div class="game" data-id="<?=$game['GameID']?>" data-blind="<?=$game['BlindIncrementID']?>" data-buyin="<?=$game['BuyInID']?>">
				<?=$game['GameID']?>
			</div>
			<div class="timer">
				<audio id="siren" src="sounds/siren_noise.wav" controls preload="auto" autobuffer></audio>
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
                <?php foreach ($repo->GetBlinds() as $blind) { ?>
					<li class="end-of-rebuy-<?=$blind['EndOfRebuy']?>"><span><?=$blind['SmallBlind']?>/<?=$blind['LargeBlind']?></span>
						<div class="finished"></div>
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
		<div class="popup-new-game hidden">
			<form id="Upsert_Game" method="post">
				<div class="form-field">
					<label for="Date">Date</label>
					<input type="date" name="Date" id="Date" />
				</div>
				<div class="form-field">
					<label for="BuyinID">Buy-in</label>
					<Select id="BuyinID" name="BuyinID">
						<?php 
						$selected = 'false';
						foreach ($repo->GetBuyInOptions() as $option) 
						{ 
							if ($option['BuyinID'] == $game['BuyInID']) 
							{
								$selected = 'selected';
							}
						?>
							<option value='<?=$option['BuyinID']?>' selected='<?=$selected?>'>
								<?php 
								echo "${$option['Amount']}";
								if (!empty($option['Bounty']) && $option['Bounty'] > 0) 
								{ 
									echo " + ${$option['Bounty']}";
								} 
								?>
							</option>
		                <?php } ?>
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
				</div>
			</form>
		</div>
		<div class="popup-add-player hidden">
			<form id="Upsert_Player" action="addplayer.php" method="post">
				<div class="form-field">
					<label for="PlayerID">Players</label>
					<Select name="PlayerID" id="PlayerID">
						<option value='0'></option>
						<?php foreach ($repo->GetAvailablePlayers($game['GameID']) as $player) { ?>
							<option value='<?=$player['PlayerID']?>'><?=$player['FirstName'] $player['LastName']?></option>
						<?php } ?>
					</select>
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
				</div>
			</form>
		</div>
    </body>
</html>
