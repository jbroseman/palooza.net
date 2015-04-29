<?php

require_once('../src/Repository.php');
require_once('../src/timer.php');

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
				<div class="timer"><?=$game['GameID']?>}</div>
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
					<Select name="BuyinID"></select> <!-- Select buy in -->
					<Select name="BlindID"></select> <!-- Select blind rate -->
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
					<Select></select> <!-- Select players not in game -->
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
