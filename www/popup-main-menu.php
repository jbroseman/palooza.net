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