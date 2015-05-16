<div class="popup set-payouts plaque hidden">
	<div class="bevel">
		<?php
			$p = $buyincount * $game['BuyIn'];	#pot current value
			$b = $game['BuyIn'];				#buyin
			$n = count($players);				#number players
			$w = ((integer) ($n/6)) + 1;		#winners count
			
			#give the worst placed winner their buyin back
			$suggwinnings = array($w => $b);
			#remove assigned winnings from pot
			$p = ($p - $b);
			
			#for every winner between first and last... $x is current placing
			for ($x = ($w - 1); $x > 1; $x++) {
				# $mw is the average total betwenn remaining winners
				$mw = ($p - $b)/($w - 1);
				# should come up with a whole number that is proportionate to placing
				$prize = round($mw/($x)) + $mw;
				# add placing and prize to winnings array
				$suggwinnings[$x] = $prize;
				# remove prize from pot
				$p = $p - $prize;
			}
			
			# assign what's left of the pot to first place
			$suggwinnings[1] = $p;
		?>
		<input type="hidden" id="Suggested-Payouts" val="<?=json_encode($suggwinnings)?>" />
		<table class="ui-grid suggested-payout">
			<thead><tr><th>Place</th><th> Winnings</th></tr></thead>
			<tbody>
				<?php foreach (ksort($winnings) as $place=>$prize) { ?>
					<tr><td>Place: <?=$place?></td><td> Winnings: <?=$prize?></td></tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="button-container suggested-payout">
			<div class="button close-popup">Cancel</div>
			<div class="button" id="Button_Custom_Payout">Custom</div>
			<div class="button" id="Button_Accept_Suggested_Payout">Accept</div>
		</div>
		<form class="custom-payout hidden">
			<span class="pot-total">$<?=$p?></span>
			<div class="form-field">
				<label>Place</label>
				<select name="PlaceValue" id="PlaceValue">
					<?php for ($x = 0; $x < $n; $x++) { ?>
						<option value="$x"><?=$x?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-field">
				<label>Prize</label>
				<input type="text" name="Amount" id="Amount" />
			</div>
			<div class="button" id="Button_Add_Custom_Payout">Add</div>
		</form>
		<table class="ui-grid custom-payout hidden">
			<thead><tr><th>Place</th><th> Winnings</th></tr></thead>
			<tbody>
				<?php foreach (ksort($winnings) as $place=>$prize) { ?>
					<tr><td>Place: <?=$place?></td><td> Winnings: <?=$prize?></td></tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="button-container custom-payout hidden">
			<div class="button close-popup">Cancel</div>
			<div class="button" id="Button_Suggested_Payout">Back</div>
			<div class="button" id="Button_Upsert_Custom_Payout">Save</div>
		</div>
	</div>
</div>
