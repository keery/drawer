<div>
    <article class="article col-sm-8">
      <div class="header">
        <h1>Contact</h1>
      </div>
      <div class="u-pd--m">
        <section id="contact">
            <div class="container-grid">
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
                    <div>
                        <?php echo $form->label('email'); ?>
                        <?php echo $form->input('email', ['class' => 'input']); ?>
                    </div>
                    <div>
                        <?php echo $form->label('titre'); ?>
                        <?php echo $form->input('titre', ['class' => 'input']); ?>
                    </div>
                    <div>
                        <?php echo $form->label('message'); ?>
                        <?php echo $form->input('message', ['class' => 'input']); ?>
                    </div>
                    <div class="text-right">
                        <?php echo $form->input('submit', ['class' => 'button inv']); ?>
                    </div>
                <?php $form->form_bottom(); ?>
            </div>
        </section>
      </div>

    </article>
</div>