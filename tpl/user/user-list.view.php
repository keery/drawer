<img src="assets/img/man-user.svg" alt="" class="picto-page picto-user">
<h1>Utilisateurs</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links">
    <a href="<?php echo path('users') ?>" <?php echo (getCurrentUrl() === "users" ? 'class="selected"' : '') ?>>Tous</a>
    <a href="<?php echo path('users')."?sort=active"; ?>" <?php echo (getCurrentUrl() === "users?sort=active" ? 'class="selected"' : '') ?>>Active</a>
    <a href="<?php echo path('users')."?sort=banned"; ?>" <?php echo (getCurrentUrl() === "users?sort=banned" ? 'class="selected"' : '') ?>>Banni</a>
  </div>
  <a href="<?php echo path('user_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
<?php foreach(getNotifs('valid') as $notif) : ?>
  <div class="notif valid">
      <span class="notif-icone"></span>
      <div class="notif-titre">Réussi:</div>
      <?php echo $notif; ?>
  </div>
<?php endforeach; ?>
<section class="container">
  <?php if(count($users) > 0): ?>
  <ul class="list">
    <?php foreach($users as $user) : ?>
      <li class="list-item">
        <div class="text-list"><?php echo $user->getPseudo(); ?></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('user_edit', ['id' => $user->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'user', 'id' => $user->getId()]); ?>" title="Supprimer" class="dial"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <div class="notif information">
        <span class="notif-icone"></span>
        <div class="notif-titre">Info:</div>
        Aucun user disponible
    </div>
  <?php endif; ?>
</section>