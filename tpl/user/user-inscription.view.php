<div id="installer" class="u-pd--m">
    <?php $form->form_head("form u-pd--l container-grid"); ?>
    <div>
      <h1>Inscription</h1>
        <?php foreach(getNotifs('error') as $notif) : ?>
            <div class="notif error">
                <span class="notif-icone"></span>
                <div class="notif-titre">Erreur:</div>
                <?php echo $notif; ?>
            </div>
        <?php endforeach; ?>
        <?php foreach(getNotifs('valid') as $notif) : ?>
          <div class="notif valid">
              <span class="notif-icone"></span>
              <div class="notif-titre">Réussi:</div>
              <?php echo $notif; ?>
          </div>
        <?php endforeach; ?>
      
        <div class="container-grid">
            <div class="row form-installer">
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('pseudo', true, true); ?></div>
                    <?php echo $form->input('pseudo', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('password', true, true); ?></div>
                    <?php echo $form->input('password', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('password_confirmation', true, true); ?></div>
                    <?php echo $form->input('password_confirmation', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('email', true, true); ?></div>
                    <?php echo $form->input('email', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('prenom', true, true); ?></div>
                    <?php echo $form->input('prenom', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('nom', true, true); ?></div>
                    <?php echo $form->input('nom', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('profession'); ?></div>
                    <?php echo $form->input('profession', ['class' => 'input full']); ?>
                </div>
                <div class="col-xs-12">
                    <div><?php echo $form->label('image'); ?></div>
                    <?php echo $form->input('image', ['class' => 'input full']); ?>
                </div>
            </div>
        </div>
        <div class="text-right">
            <a href="<?php echo path('site'); ?>" class="button ">Retour au site</a>
            <?php echo $form->input('submit', ['class' => 'button', 'value' => 'Confirmer']); ?>
        </div>
    </div>    
    <?php $form->form_bottom(); ?>
</div>