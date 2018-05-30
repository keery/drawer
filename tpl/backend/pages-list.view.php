<img src="assets/img/page-picto.svg" alt="" class="picto-page">
<h1>Mes pages</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">Published</a>
    <a href="">Drafts</a>
    <a href="">Scheduled</a>
    <a href="">Trashed</a>
  </div>
  <a href="<?php echo path('page_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
<section class="container">
  <?php if(count($pages) > 0): ?>
  <ul class="list">
    <?php foreach($pages as $page) : ?>
      <li class="list-item">
        <div class="text-list"><?php echo $page->getTitre(); ?></div>
        <div class="details-list"><span class="date-details-list"><?php echo format_date($page->getDate_creation(), "d/m/Y"); ?></span></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('page_edit', ['id' => $page->getId()]); ?>" title="Éditer"><i class="fas fa-edit"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'page', 'id' => $page->getId()]); ?>" title="Supprimer"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <div class="notif information">
        <span class="notif-icone"></span>
        <div class="notif-titre">Info:</div>
        Aucune page disponible
    </div>
  <?php endif; ?>
</section>