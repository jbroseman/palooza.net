<div class="chip-values plaque">
	<div class="bevel">
		<?php foreach ($chips as $chip) { ?>
			<div class="item">
				<img src="img/<?=$chip['ImageFilename']?>" alt="<?=$chip['PrimaryColor']?> chip, <?=$chip['Denomination']?> units" />
				<span><?=$chip['Denomination']?></span>
			</div>
		<?php } ?>
	</div>
</div>