<div>
    <article class="article col-sm-8">
      <div class="header">
        <h1><?php echo $article->getTitre(); ?></h1>
      </div>
      <div class="u-pd--m">
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
        <?php if($article->getAuteur()) echo "<i class='author'>Oeuvre de ".$article->getAuteur()."</i>"; ?>
        <?php if($article->getDescription()) echo "<p>".$article->getDescription()."</p>"; ?>
      </div>
      <?php if(count($article->getImages()) > 0): ?>
        <div class="text-center spacing">
            <?php foreach($article->getImages() as $img): ?>
                <div class="img-container">
                    <?php echo renderImg($img); ?>                    
                </div>                
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if( sizeof($commentaires) > 0): ?>
        <div class="spacing spacing-v">
        <?php foreach($commentaires as $comm) : ?>
            <div class="comm">
                <div class="info-comm author"><?php echo date_publication($comm->getPublication()) ?> par <?php echo $comm->getUser()->getPrenom() . " " . $comm->getUser()->getNom()[0]."."; ?></div>
                <?php echo $comm->getCommentaire(); ?>
            </div>
        <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="post-comm">
        <?php if(isGranted(ROLE_UTILISATEUR)): ?>
            <div class="spacing spacing-v">
                <?php $form->form_head(); ?>
                    <div><?php echo $form->label('commentaire'); ?></div>
                    <?php echo $form->input('commentaire', ['class' => 'select full comm-field']); ?>
                    <?php echo $form->input('submit', ['class' => 'button btn-validate full']); ?>
                <?php $form->form_bottom(); ?>
            </div>
        <?php else: ?>
            <div class="spacing spacing-v">
                <div class="notif information full">
                    <span class="notif-icone"></span>
                    <div class="notif-titre">Info:</div>
                    <div>Si vous souhaitez commenter ou réagir à cette oeuvre, il est nécessaire d'être <a href="<?php echo path('connexion'); ?>">connecté</a>.</div>
                    <div>Vous pouvez vous inscrire en cliquant <a href="<?php echo path('inscription'); ?>">ici</a></div>
                </div>
            </div>
        <?php endif; ?>
      </div>
      <div class="spacing text-right spacing-v">
        <a href="<?php echo path("oeuvre"); ?>" class="button inv">Retour à la liste</a>
      </div>
    </article>
</div>