<?php if ($game['GameID'] > 0) { ?>
	<div class="blinds">
	    <ul>
		    <?php foreach ($blinds as $blind) { ?>
				<?php if ($blind['Completed'] && $blind['Completed'] == true) { $completedblinds++; } ?>
				<li class="end-of-rebuy-<?=$blind['EndOfRebuy']?> completed-<?=$blind['Completed']?>" data-id="<?=$blind['BlindID']?>">
					<?php if ($blind['EndOfRebuy'] == 1 && $blind['Completed'] == 1) { ?>
						<div class="button" title="Configure payouts" id="Configure_Payouts">$</div>
					<?php } ?>
					<span><?=$blind['SmallBlind']?>/<?=$blind['LargeBlind']?></span>
					<div class="status"></div>
					<?php if (!empty($blind['ChipUpID']) && $blind['Completed'] == false) { ?>
						<div class="chip-up chip-up-<?=$blind['ChipUpID']?>">
							BREAK 15 min! Chip up <img src="img/<?=$blind['ChipUpIMG']?>" />
						</div>
					<?php } ?>
				</li>
		    <?php } ?>
	    </ul>
	</div> 
<?php } ?>