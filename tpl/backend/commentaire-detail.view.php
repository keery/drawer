<img src="assets/img/commentaire-picto.svg" alt="" class="picto-page">
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
                <?php echo $form->input('auteur', ['class' => 'input', "value" => $_SESSION[PREFIX."user"]['prenom']." ".$_SESSION[PREFIX."user"]['nom']]); ?>
                <div class="col-sm-6 col-xs-12">
                    <label>Catégorie</label>
                    <?php echo $form->input('categorie', ['class' => 'select']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>État</label>
                    <?php echo $form->input('active'); ?>
                </div>
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
            <?php echo $form->input('description', ['class' => 'editor-img']); ?>
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
    <a href="<?php echo path('commentaires'); ?>" class="button btn-validate">Retour à la liste</a>
    <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
</div>
<?php $form->form_bottom(); ?>