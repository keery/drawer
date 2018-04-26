

<div id="installer" class="u-pd--m">
<form method="<?php echo  $config["config"]["method"]?>" class="form u-pd--l container-grid" action="<?php echo $config["config"]["action"]?>">
    <div>
        <h1 class="u-mgt--0"><?php echo  $config["name"]?></h1>
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

	<input type="submit" class="button u-mw btn-validate" value="<?php echo $config["config"]["submit"];?>">
    </div>
</form>
</div>


