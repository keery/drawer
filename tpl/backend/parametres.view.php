<img src="assets/img/settings-picto.svg" alt="" class="picto-page">
<h1>Paramètres</h1>
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
  <?php if(isGranted(ROLE_ADMINISTRATEUR)): ?>
  <?php $form->form_head(); ?>
  <section class="container padding-box">
    <div class="container-grid">
      <div class="row">
        <div class="col-md-3 col-xs-12 u-tac group-xs">
          <label>Icône du site</label>
          <div class="preview-icon u-block--center"></div>
          <div class="text-center">
            <a href="" class="button">Ajouter</a>
          </div>
        </div>
        <div class="col-md-6 col-xs-12 group spacing-left">
          <div>
            <?php echo $form->label('titre'); ?>
            <?php echo $form->input('titre', ['class' => 'input']); ?>
          </div>
          <div class="u-mgt--m">
            <?php echo $form->label('soustitre'); ?>
            <?php echo $form->input('soustitre', ['class' => 'input']); ?>
          </div>
        </div>
        <div class="text-right text-center-xs col-md-3 col-xs-12">
          <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>     
        </div>
      </div>
    </div>
    <div class="u-mgt--l">
      <div class="row">
        <div class="col-sm-6 col-xs-12 group spacing-left">
          <label><?php echo $form->label('facebook', false); ?></label>
          <?php echo $form->input('facebook', ['class' => 'input']); ?>
        </div>
        <div class="col-sm-6 col-xs-12 group spacing-left">
          <label><?php echo $form->label('linkedin', false); ?></label>
          <?php echo $form->input('linkedin', ['class' => 'input']); ?>
        </div>
        <div class="col-sm-6 col-xs-12 group spacing-left">
          <label><?php echo $form->label('instagram', false); ?></label>
          <?php echo $form->input('instagram', ['class' => 'input']); ?>
        </div>
        <div class="col-sm-6 col-xs-12 group spacing-left">
          <label><?php echo $form->label('twitter', false); ?></label>
          <?php echo $form->input('twitter', ['class' => 'input']); ?>
        </div>                  
      </div>
    </div>
  </section>
  <section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Contenu</span>
        </div>
        <div class="bloc-content">
            <?php echo $form->input('description', ['class' => 'editor-img small']); ?>
        </div>
    </div>
  </section>
  <?php $form->form_bottom(); ?>
  <?php endif; ?>

  <section class="container padding-box">
    <div class="container-grid">
      <div class="row">      
        <div class="col-md-2 col-xs-12 u-tac group">
          <label>Icône profil</label>
          <div class="picture-circle" style="background-image: url(assets/img/Group.png);"></div>
          <div class="text-center">
            <a href="" class="button">Modifier</a>
          </div>
        </div>
        <div class="col-md-5 col-xs-12">
          <div class="spacing">
            <div class="group">
              <label>Identifiant</label>
              <input type="text" class="input">
            </div>          
            <div class="group">         
              <label>Email</label>
              <input type="text" class="input">          
            </div>
          </div>
        </div>
        <div class="col-md-5 col-xs-12">
          <div class="spacing">
            <div class="group">
              <label>Password</label>
              <input type="password" class="input">            
            </div>
            <div class="group">       
              <label>Confirmation password</label>
              <input type="password" class="input">     
            </div>
          </div>
        </div>
        <div class="text-right u-tac col-xs-12">
          <input type="submit" value="Enregistrer" class="button btn-validate">          
        </div>
      </div>
    </div>
  </section>
</div>