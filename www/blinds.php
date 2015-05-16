<div class="blinds">
    <ul>
	    <?php foreach ($blinds as $blind) { ?>
			<?php if ($blind['Completed'] && $blind['Completed'] == true) { $completedblinds++; } ?>
			<li class="end-of-rebuy-<?=$blind['EndOfRebuy']?> completed-<?=$blind['Completed']?>" data-id="<?=$blind['BlindID']?>"><span><?=$blind['SmallBlind']?>/<?=$blind['LargeBlind']?></span>
				<div class="status"></div>
			</li>
	    <?php } ?>
    </ul>
</div> 