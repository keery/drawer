<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Comment améliorer son dessin en 3 semaines</h1>
<?php $form->form_head(); ?>
<section class="container group">
    <div class="bloc">

        <a href="<?php echo path('delete_entity', ['id' => 1, 'entity' => 'article']); ?>">test</a>
        <div></div>
        <div class="bloc-titre">
            <span>Informations</span>
        </div>
        <div class="bloc-content">
            <div class="row spacing">
                <div class="group col-sm-6 col-xs-12">
                    <?php echo $form->label('titre'); ?>
                    <?php echo $form->input('titre', ['class' => 'input']); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <label>Catégorie</label>
                    <?php echo $form->input('categorie', ['class' => 'select']); ?>
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
    <a href="" class="button btn-validate">Retour à la liste</a>
    <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
</div>
<?php $form->form_bottom(); ?>