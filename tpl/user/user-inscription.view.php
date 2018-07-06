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
                    <div><?php echo $form->label('pseudo'); ?></div>
                    <?php echo $form->input('pseudo', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('email'); ?></div>
                    <?php echo $form->input('email', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('password'); ?></div>
                    <?php echo $form->input('password', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('password_confirmation'); ?></div>
                    <?php echo $form->input('password_confirmation', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('prenom'); ?></div>
                    <?php echo $form->input('prenom', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('nom'); ?></div>
                    <?php echo $form->input('nom', ['class' => 'input full']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div><?php echo $form->label('profession', true, false); ?></div>
                    <?php echo $form->input('profession', ['class' => 'input full']); ?>
                </div>
                <div class="col-xs-12">
                    <div><?php echo $form->label('image', true, false); ?></div>
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