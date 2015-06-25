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
				<div id="Button_Cancel_Upsert_Player" class="button cancel">Cancel</div>
				<div id="Button_Upsert_Player" class="button submit">Submit</div>
			</div>
		</form>
	</div>
</div>