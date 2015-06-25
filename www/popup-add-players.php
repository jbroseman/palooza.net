<div class="popup add-players plaque hidden">
	<div class="bevel">
		<form id="Upsert_Players">
			<div class="form-field">
				<select disabled="disabled" name="SortBy" id="SortBy">
					<option value='Name'>Name</option>
				</select>
			</div>
			<?php
				$players = $repo->GetAvailablePlayers($game['GameID']);
				if (count($players) === 0) {
			?>
			
			<p>
				There doesn't seem to be any players saved.
			</p>
			<div class="button-wrapper">
				<div id="Add_Player" class="button">Add Player</div>
				<div id="Button_Cancel_Upsert_Players" class="button">Cancel</div>
			</div>

			<?php } else { ?>
			
			<ul>
				<?php foreach ($players as $player) { ?>
				
					<li data-id='<?=$player['PlayerID']?>'> 
						<input type='checkbox'>
						<label><?=$player['FirstName']?> <?=$player['LastName']?></label>
					</li>
				
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="button-wrapper">
				<div id="Button_Cancel_Upsert_Players" class="button cancel">Cancel</div>
				<div id="Button_Upsert_Players" class="button submit">Submit</div>
			</div>
		</form>
	</div>
</div>