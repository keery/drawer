<i class="fas fa-user-cog picto-page"></i>
<h1>Profil</h1>
<div id="settings">
  <?php foreach(getNotifs('valid') as $notif) : ?>
    <div class="notif valid">
        <span class="notif-icone"></span>
        <div class="notif-titre">Réussi:</div>
        <?php echo $notif; ?>
    </div>
  <?php endforeach; ?>
  <?php foreach(getNotifs('error') as $notif) : ?>
      <div class="notif error">
          <span class="notif-icone"></span>
          <div class="notif-titre">Erreur:</div>
          <?php echo $notif; ?>
      </div>
  <?php endforeach; ?>


    <?php $form->form_head(); ?>
        <section class="container padding-box">
            <div class="container-grid">
            <div class="row">      
                <!-- <div class="col-md-2 col-xs-12 u-tac group">
                <label>Icône profil</label>
                <div class="picture-circle" style="background-image: url(assets/img/Group.png);"></div>
                <div class="text-center">
                    <a href="" class="button">Modifier</a>
                </div>
                </div> -->
                <div class="col-sm-6 col-xs-12">
                <div class="spacing">     
                    <div class="group">         
                        <?php echo $form->label('email'); ?>
                        <?php echo $form->input('email', ['class' => 'input']); ?>              
                    </div>
                    <div class="group">         
                        <?php echo $form->label('prenom'); ?>
                        <?php echo $form->input('prenom', ['class' => 'input']); ?>              
                    </div>
                    <div class="group">
                        <?php echo $form->label('password'); ?>
                        <?php echo $form->input('password', ['class' => 'input']); ?>          
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                <div class="spacing">
                    <div class="group">         
                        <?php echo $form->label('nom'); ?>
                        <?php echo $form->input('nom', ['class' => 'input']); ?>              
                    </div>
                    <div class="group">         
                        <?php echo $form->label('profession'); ?>
                        <?php echo $form->input('profession', ['class' => 'input']); ?>              
                    </div>
                    <div class="group">       
                        <?php echo $form->label('password_confirmation'); ?>
                        <?php echo $form->input('password_confirmation', ['class' => 'input']); ?>  
                    </div>
                </div>
                </div>

            </div>
            </div>
            
        </section>
        <div class="text-right text-center-xs col-xs-12 spacing-v">
            <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
        </div>
    <?php $form->form_bottom(); ?>
</div>