<div id="installer" class="u-pd--m">
<form method="<?php echo  $config["config"]["method"]?>" action="<?php echo $config["config"]["action"]?>">
	<div class="form u-pd--l container-grid">
		<div>
			<h1 class="u-mgt--0"><?php echo  $config["name"]?></h1>

			<?php if(isset($errors) && sizeof($errors) > 0) : ?>
				<?php foreach($errors as $error) : ?>
					<div class="notif error">
						<span class="notif-icone"></span>
						<div class="notif-titre">Erreur:</div>
						<?php echo $error; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php foreach ($config["input"] as $name => $attributs):?>
			
			<?php if($attributs["type"]=="text" || $attributs["type"]=="email" || $attributs["type"]=="number" || $attributs["type"]=="password"):?>

				<input
					class="input u-mw u-mgb--m"
					type="<?php echo $attributs["type"];?>" 
					placeholder="<?php echo $attributs["placeholder"];?>"
					name="<?php echo $name;?>"
					<?php echo (isset($attributs["required"]))?"required='required'":"";?>
				><br>

			<?php endif;?>

		<?php endforeach;?>

		</div>
	</div>

	<div class="form u-pd--l container-grid">
		
	</div>

	<input type="submit" class="button u-mw btn-validate" value="<?php echo $config["config"]["submit"];?>">
</form>
</div>


