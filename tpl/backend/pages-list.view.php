<img src="assets/img/page-picto.svg" alt="" class="picto-page">
<h1>Mes pages</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links">
    <a href="" class="selected">Tous</a>
  </div>
  <a href="<?php echo path('page_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
<?php foreach(getNotifs('valid') as $notif) : ?>
  <div class="notif valid">
      <span class="notif-icone"></span>
      <div class="notif-titre">Réussi:</div>
      <?php echo $notif; ?>
  </div>
<?php endforeach; ?>
<section class="container">
  
  <?php function indentPages($pages, $indent="20") {
    foreach($pages as $page) : ?>
      <li class="list-item <?php echo 'indent-'.$indent; ?>">
        <div class="text-list"><?php echo $page['object']->getTitre(); ?></div>
        <div class="details-list"><span class="date-details-list"><?php echo format_date($page['object']->getDate_creation(), "d/m/Y"); ?></span></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('page_edit', ['id' => $page['object']->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'page', 'id' => $page['object']->getId()]); ?>" title="Supprimer"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php
      if(isset($page['childrens']) && count($page['childrens']) > 0) indentPages($page['childrens'], $indent+20);
      endforeach;
    } ?>
    <?php if(count($pages) > 0): ?>
      <ul class="list">
        <?php indentPages($pages); ?>
      </ul>
    <?php else: ?>
      <div class="notif information">
          <span class="notif-icone"></span>
          <div class="notif-titre">Info:</div>
          Aucune page disponible
      </div>
    <?php endif; ?>
</section>