<i class="fas fa-list picto-page"></i>
<h1><?php echo $titre; ?></h1>
<?php $form->form_head(); ?>
<section class="container group">
  <div class="bloc">
    <div class="bloc-titre">
      <span>Informations</span>
    </div>
    <div class="bloc-content">
      <?php foreach(getNotifs('error') as $notif) : ?>
          <div class="notif error">
              <span class="notif-icone"></span>
              <div class="notif-titre">Erreur:</div>
              <?php echo $notif; ?>
          </div>
      <?php endforeach; ?>
      <div class="row spacing">
            <div class="group col-sm-6 col-xs-12">
                <?php echo $form->label('titre'); ?>
                <?php echo $form->input('titre', ['class' => 'input']); ?>
            </div>
            <?php if($titre != "Accueil") : ?>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('type'); ?>
                    <?php echo $form->input('type', ['class' => 'input']); ?>
                </div>
            <?php endif; ?>
            <div class="group col-sm-6 col-xs-12">
                <?php echo $form->label('url'); ?>
                <?php echo $form->input('url', ['class' => 'input']); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <label>Page parente</label>
                <?php echo $form->input('parent', ['class' => 'select']); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <label>État</label>
                <?php echo $form->input('active'); ?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <label>Dans le menu ?</label>
                <?php echo $form->input('inmenu'); ?>
            </div>
      </div>
    </div>
  </div>
</section>  

<section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Description</span>
        </div>
        <div class="bloc-content">
            <?php echo $form->input('description', ['class' => 'editor small']); ?>
        </div>
    </div>
</section>

<div class="text-right text-center-xs col-xs-12">
    <a href="<?php echo path('pages'); ?>" class="button btn-validate">Retour à la liste</a>
    <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
</div>
<?php $form->form_bottom(); ?>