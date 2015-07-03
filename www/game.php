<?php if ($game['GameID'] > 0) { ?>
	<div class="game" data-id="<?=$game['GameID']?>" data-blind="<?=$game['BlindIncrementID']?>" data-buyin="<?=$game['BuyInID']?>">
		<?php 
			$bonuschips = $completedblinds * 10000;
			$totalpot = ($game['BuyInAmount'] * $buyincount);
			$chipsinplay = (($buyincount * $game['BeginningStack']) + $bonuschips);
		?>
			<div class="total-pot"><label>Total Pot</label><span>$<?=number_format($totalpot, 2)?></span></div>
			<div class="chips-in-play"><label>Chips in play</label><span>$<?=number_format($chipsinplay, 0)?></span></div>
	</div>
<?php } ?>