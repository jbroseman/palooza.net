<?php if ($game['GameID'] > 0) { ?>
	<div class="game" data-id="<?=$game['GameID']?>" data-blind="<?=$game['BlindIncrementID']?>" data-buyin="<?=$game['BuyInID']?>">
		<?php 
			$bonuschips = $completedblinds * 10000 * round($game['PlayerCount'] / 9);
			$totalpot = (($game['BuyInAmount'] * $buyincount) + ($game['BumpCost'] * $bumpcount));
			$chipsinplay = ((($buyincount * $game['BeginningStack']) + $bonuschips) + ($bumpcount * $game['BumpStack']));
			$avgstack = $activeplayercount == 0 ? 0 : ($chipsinplay / $activeplayercount)
		?>
			<div class="total-pot"><label>Total Pot</label><span>$<?=number_format($totalpot, 2)?></span></div>
			<div class="chips-in-play"><label>Avg Stack</label><span>$<?=number_format($avgstack, 0)?></span></div>
	</div>
<?php } ?>