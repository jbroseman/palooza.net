<div class="popup new-game plaque hidden">
	<div class="bevel">
		<form id="Upsert_Game" method="post">
			<div class="form-field">
				<label for="Date">Date</label>
				<input type="date" name="Date" id="Date" />
			</div>
			<div class="form-field">
				<label for="BuyinID">Buy-in</label>
				<select id="BuyinID" name="BuyinID">
				<?php
					foreach ($repo->GetBuyInOptions() as $option) 
					{ 
						$selected = '';							
						
						if ($option['BuyinID'] == $game['BuyInID']) 
						{
							$selected = 'selected';
						}

						if (!empty($option['Bounty']) && $option['Bounty'] > 0)
						{
							$text = "{$option['Amount']} {$option['Bounty']}";
						}
						else
						{
							$text = $option['Amount'];
						}
				?>
					<option value="<?=$option['BuyinID']?>" <?=$selected?>>
						<?=$text?>
					</option>
                <?php
                	}
                ?>
				</select>
			</div>
			<div class="form-field">
				<label for="BlindIncrementID">Blinds</label>
				<Select id="BlindIncrementID" name="BlindIncrementID">
					<?php 
					$selected = 'false';
					foreach ($repo->GetBlindOptions() as $option) 
					{ 
						if ($option['BlindIncrementID'] == $game['BlindIncrementID']) 
						{
							$selected = 'selected';
						}
					?>
						<option value='<?=$option['BlindIncrementID']?>' selected='<?=$option['BlindIncrementID']==$game['BlindIncrementID']?>'>
							<?=$option['Length']?> minutes
						</option>
	                <?php } ?>
				</select>
			</div>
			<div class="form-field">
				<label for="BeginningStack">Beginning Stack</label>
				<input type="text" name="BeginningStack" id="BeginningStack" />
			</div>
			<div class="button-wrapper">
				<div id="Button_Cancel_Upsert_Game" class="button cancel">Cancel</div>
				<div id="Button_Upsert_Game" class="button submit">Submit</div>
			</div>
		</form>
	</div>
</div>