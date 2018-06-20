<?php
//
//include "module/view/form/form.frm.php";
?>

<img src="assets/img/template-brush-black.svg" alt="" class="picto-page">
<h1><?php echo $titre; ?></h1>

<?php $form->form_head(); ?>
<div id="settings">
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
    <h2>Style</h2>

    <section class="container padding-box">
        <div class="container-grid">
            <div class="row">

                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('principal'); ?>
                    <?php echo $form->input('principal', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('secondaire'); ?>
                    <?php echo $form->input('secondaire', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('highlight'); ?>
                    <?php echo $form->input('highlight', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('highlight secondaire'); ?>
                    <?php echo $form->input('highlight secondaire', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('sous titre'); ?>
                    <?php echo $form->input('sous titre', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('sous titre secondaire'); ?>
                    <?php echo $form->input('sous titre secondaire', ['class' => 'color']); ?>
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <?php echo $form->label('texte'); ?>
                    <?php echo $form->input('texte', ['class' => 'color']); ?>
                </div>
                <div class="text-right text-center-xs col-md-3 col-xs-12">
                    <input type="submit" value="Enregistrer" class="button btn-validate">
                </div>
            </div>
        </div>
    </section>
</div>
<?php $form->form_bottom(); ?>