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
  <?php $form->form_head(); ?>
  <section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Paramètres du site</span>
        </div>
        <div class="bloc-content">
        <div class="row spacing">
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('titre'); ?>
              <?php echo $form->input('titre', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('soustitre'); ?>
              <?php echo $form->input('soustitre', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('facebook'); ?>
              <?php echo $form->input('facebook', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('linkedin'); ?>
              <?php echo $form->input('linkedin', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('instagram'); ?>
              <?php echo $form->input('instagram', ['class' => 'input']); ?>
            </div>
            <div class="group col-sm-6 col-xs-12">
              <?php echo $form->label('twitter'); ?>
              <?php echo $form->input('twitter', ['class' => 'input']); ?>
            </div>
        </div>
    </div>
  </section>

  <section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Icône du site</span>
        </div>
        <div class="bloc-content">
          <?php echo $form->input('image', ['class' => 'front']); ?>
        </div>
    </div>
  </section>
  <section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Présentation</span>
        </div>
        <div class="bloc-content">
            <?php echo $form->input('description', ['class' => 'editor-img small']); ?>
        </div>
    </div>
  </section>
  <div class="text-right text-center-xs col-xs-12">
      <a href="<?php echo path('articles'); ?>" class="button btn-validate">Retour à la liste</a>
      <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
  </div>
  <?php $form->form_bottom(); ?>
</div>