<img src="assets/img/man-user.svg" alt="" class="picto-page picto-user">
<h1>Utilisateurs</h1>

<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">on met des filtre ici</a>
    <a href=""> ou pas?</a>
  </div>
    <a href="<?php echo path('user_add'); ?>" class="btn-add" title="Ajouter un utilisateur"></a>
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
                    <div class="text-list"><?php echo $user->getFirstName(); ?></div>
                    <div class="text-list"><?php echo $user->getLastName(); ?></div>
                    <div class="details-list"><span class="date-details-list"><?php echo format_date($user->getDate_Inscription(), "d/m/Y"); ?></span></div>
                    <ul class="panel-action">
                        <li><a href="<?php echo path('user_edit', ['id' => $user->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
                        <li><a href="<?php echo path('delete_entity', ['entity' => 'user', 'id' => $user->getId()]); ?>" title="Supprimer"><i class="far fa-trash-alt"></i></a></li>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="notif information">
            <span class="notif-icone"></span>
            <div class="notif-titre">Info:</div>
            Aucun utilisateur disponible
        </div>
    <?php endif; ?>
</section>


