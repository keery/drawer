<i class="far fa-comment picto-page"></i>
<h1>Commentaires</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links">
    <a href="<?php echo path('commentaires') ?>" <?php echo (getCurrentUrl() === "commentaires" ? 'class="selected"' : '') ?>>Tous</a>
    <a href="<?php echo path('commentaires')."?sort=active"; ?>" <?php echo (getCurrentUrl() === "commentaires?sort=active" ? 'class="selected"' : '') ?>>Publiés</a>
    <a href="<?php echo path('commentaires')."?sort=unactive"; ?>" <?php echo (getCurrentUrl() === "commentaires?sort=unactive" ? 'class="selected"' : '') ?>>Non publiés</a>
  </div>
</nav>
<?php foreach(getNotifs('valid') as $notif) : ?>
  <div class="notif valid">
      <span class="notif-icone"></span>
      <div class="notif-titre">Réussi:</div>
      <?php echo $notif; ?>
  </div>
<?php endforeach; ?>
<section class="container">
  <?php if(count($commentaires) > 0): ?>
  <ul class="list">
    <?php foreach($commentaires as $commentaire) : ?>
      <li class="list-item">
        <div class="text-list">
            <?php 
            $state = "valid";
            if($commentaire->getActive() == 0) $state = "error"; ?>
            <i class="far fa-bookmark <?php echo $state; ?>"></i>
            <?php echo truncate($commentaire->getCommentaire(), 50); ?>
        </div>
        <div class="details-list"><span class="date-details-list"><?php echo date_publication($commentaire->getPublication()). " " .strtoupper($commentaire->getUser()->getNom()).' '.$commentaire->getUser()->getPrenom(); ?></span></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('commentaire_edit', ['id' => $commentaire->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'commentaire', 'id' => $commentaire->getId()]); ?>" title="Supprimer" class="dial"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <div class="notif information">
        <span class="notif-icone"></span>
        <div class="notif-titre">Info:</div>
        Aucun commentaire disponible
    </div>
  <?php endif; ?>
</section>