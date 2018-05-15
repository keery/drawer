<img src="../../../assets/img/man-user.svg" alt="" class="picto-page picto-user">
<h1>Utilisateurs</h1>

<nav class="container ctn-nav small-xs">
    <div class="nav-links" data-selected-filter="Published">
        <h2>Formulaire d'ajout</h2>
    </div>

</nav>
<div class="bloc-content">
    <div class="row spacing">
        <div class="group col-sm-6 col-xs-12">
            <?php echo $form->label('email'); ?>
            <?php echo $form->input('email', ['class' => 'input']); ?>
        </div>
        <div class="group col-sm-6 col-xs-12">
            <?php echo $form->label('password'); ?>
            <?php echo $form->input('password', ['class' => 'input']); ?>
        </div>
        <div class="group col-sm-6 col-xs-12">
            <?php echo $form->label('firstname'); ?>
            <?php echo $form->input('firstname', ['class' => 'input']); ?>
        </div>
        <div class="group col-sm-6 col-xs-12">
            <?php echo $form->label('lastname'); ?>
            <?php echo $form->input('lastname', ['class' => 'input']); ?>
        </div>
        <div class="group col-sm-6 col-xs-12">
            <?php echo $form->label('age'); ?>
            <?php echo $form->input('age', ['class' => 'input']); ?>
        </div>
        <div class="text-right text-center-xs col-xs-12">
            <a href="<?php echo path('user_list') ?>" class="button btn-validate">Retour à la liste</a>
            <?php echo $form->input('submit', ['class' => 'button btn-validate']); ?>
        </div>


    </div>
</div>