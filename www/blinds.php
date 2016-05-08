<?php if ($game['GameID'] > 0) { ?>
	<div class="blinds">
	    <ul>
		    <?php foreach ($blinds as $blind) { ?>
				<?php if ($blind['Completed'] && $blind['Completed'] == true) { $completedblinds++; } ?>
				<li class="end-of-rebuy-<?=$blind['EndOfRebuy']?> completed-<?=$blind['Completed']?>" data-id="<?=$blind['BlindID']?>">
					<?php if ($blind['EndOfRebuy'] == 1 && $blind['Completed'] == 1) { ?>
						<div class="button" title="Configure payouts" id="Configure_Payouts">$</div>
					<?php } ?>
					<?php if (!empty($blind['ChipUpID']) && $blind['Completed'] == false) { ?>
						<img class="chip-up chip-up-<?=$blind['ChipUpID']?>" src="img/<?=$blind['ChipUpIMG']?>" />
						<div class="chip-up-overlay"></div>
					<?php } ?>
					<span><?=$blind['SmallBlind']?>/<?=$blind['LargeBlind']?></span>
					<div class="status"></div>
				</li>
		    <?php } ?>
	    </ul>
	</div> 
<?php } ?>