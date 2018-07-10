<div id="installer" class="u-pd--m">
    <form  method="post" class="form u-pd--l container-grid">
        <div>
            <h1>Création de profil</h1>
            <div class="group col-sm-12 col-xs-12">
                <?php echo $form->label('nom'); ?>
                <?php echo $form->input('nom', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-12col-xs-12">
                <?php echo $form->label('prenom'); ?>
                <?php echo $form->input('prenom', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-12 col-xs-12">
                <?php echo $form->label('pseudo'); ?>
                <?php echo $form->input('pseudo', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-12 col-xs-12">
                <div class=" col-sm-6 col-xs-6">

                    <?php echo $form->label('email'); ?>
                </div>
                <div class=" col-sm-6 col-xs-6">
                    <?php echo $form->input('email', ['class' => 'input']); ?>
                </div>
            </div>
            <div class="group col-sm-12 col-xs-12">
                <?php echo $form->label('password'); ?>
                <?php echo $form->input('password', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-12 col-xs-12">
                <?php echo $form->label('profession'); ?>
                <?php echo $form->input('profession', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-12 col-xs-12">
                <?php echo $form->label('image'); ?>
                <?php echo $form->input('image', ['class' => 'front']); ?>
            </div>
            <div class="text-right text-center-xs col-xs-12">
                <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
            </div>
        </div>
    </form>
</div>