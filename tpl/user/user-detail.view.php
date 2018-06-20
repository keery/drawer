<img src="assets/img/article-picto.svg" alt="" class="picto-page">
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
                    <?php echo $form->label('pseudo'); ?>
                    <?php echo $form->input('pseudo', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('email'); ?>
                    <?php echo $form->input('email', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('prenom'); ?>
                    <?php echo $form->input('prenom', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('nom'); ?>
                    <?php echo $form->input('nom', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('profession'); ?>
                    <?php echo $form->input('profession', ['class' => 'input']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>Rôle</label>
                    <?php echo $form->input('role'); ?>
                </div> 
                <div class="col-sm-6 col-xs-12">
                    <label>État</label>
                    <?php echo $form->input('active'); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>Banni</label>
                    <?php echo $form->input('banned'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container group">
    <div class="bloc">
        <div class="bloc-titre">
            <span>Fichiers</span>
        </div>
        <div class="bloc-content">
            <?php echo $form->input('image'); ?>
        </div>
    </div>
</section>
<div class="text-right text-center-xs col-xs-12">
    <a href="<?php echo path('users'); ?>" class="button btn-validate">Retour à la liste</a>
    <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
</div>
<?php $form->form_bottom(); ?>