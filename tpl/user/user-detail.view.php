<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Utilisateur numéro </h1>
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
                    <?php echo $form->label('Adresse Email'); ?>
                    <?php echo $form->input('email', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('Prénom'); ?>
                    <?php echo $form->input('firstName', ['class' => 'input']); ?>
                </div>
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('Nom'); ?>
                    <?php echo $form->input('lastName', ['class' => 'input']); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="text-right text-center-xs col-xs-12">
    <a href="<?php echo path('users'); ?>" class="button btn-validate">Retour à la liste</a>
    <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
</div>
<?php $form->form_bottom(); ?>