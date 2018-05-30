<img src="assets/img/categorie-picto.svg" alt="" class="picto-page">
<h1>Catégories</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="<?php echo path('categories') ?>" <?php echo (getCurrentUrl() === "categories" ? 'class="selected"' : '') ?>>Tous</a>
    <a href="<?php echo path('categories')."?sort=active"; ?>" <?php echo (getCurrentUrl() === "categories?sort=active" ? 'class="selected"' : '') ?>>Publiés</a>
    <a href="<?php echo path('categories')."?sort=unactive"; ?>" <?php echo (getCurrentUrl() === "categories?sort=unactive" ? 'class="selected"' : '') ?>>Non publiés</a>
  </div>
  <a href="<?php echo path('categorie_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
<?php foreach(getNotifs('valid') as $notif) : ?>
  <div class="notif valid">
      <span class="notif-icone"></span>
      <div class="notif-titre">Réussi:</div>
      <?php echo $notif; ?>
  </div>
<?php endforeach; ?>
<section class="container">
  <?php if(count($categories) > 0): ?>
  <ul class="list">
    <?php foreach($categories as $categorie) : ?>
      <li class="list-item">
        <div class="text-list"><?php echo $categorie->getTitre(); ?></div>
        <div class="details-list"><span class="date-details-list"><?php echo format_date($categorie->getDate_creation(), "d/m/Y"); ?></span></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('categorie_edit', ['id' => $categorie->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'categorie', 'id' => $categorie->getId()]); ?>" title="Supprimer"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <div class="notif information">
        <span class="notif-icone"></span>
        <div class="notif-titre">Info:</div>
        Aucune categorie disponible
    </div>
  <?php endif; ?>
</section>