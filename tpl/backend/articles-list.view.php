<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Articles</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="<?php echo path('articles') ?>" <?php echo (getCurrentUrl() === "articles" ? 'class="selected"' : '') ?>>Tous</a>
    <a href="<?php echo path('articles')."?sort=active"; ?>" <?php echo (getCurrentUrl() === "articles?sort=active" ? 'class="selected"' : '') ?>>Publiés</a>
    <a href="<?php echo path('articles')."?sort=unactive"; ?>" <?php echo (getCurrentUrl() === "articles?sort=unactive" ? 'class="selected"' : '') ?>>Non publiés</a>
  </div>
  <a href="<?php echo path('article_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
<?php foreach(getNotifs('valid') as $notif) : ?>
  <div class="notif valid">
      <span class="notif-icone"></span>
      <div class="notif-titre">Réussi:</div>
      <?php echo $notif; ?>
  </div>
<?php endforeach; ?>
<section class="container">
  <?php if(count($articles) > 0): ?>
  <ul class="list">
    <?php foreach($articles as $article) : ?>
      <li class="list-item">
        <div class="text-list"><?php echo $article->getTitre(); ?></div>
        <div class="details-list"><span class="date-details-list"><?php echo format_date($article->getDate_creation(), "d/m/Y"); ?></span></div>
        <ul class="panel-action">
          <li><a href="<?php echo path('article_edit', ['id' => $article->getId()]); ?>" title="Éditer"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a href="<?php echo path('delete_entity', ['entity' => 'article', 'id' => $article->getId()]); ?>" title="Supprimer"><i class="far fa-trash-alt"></i></a></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    <div class="notif information">
        <span class="notif-icone"></span>
        <div class="notif-titre">Info:</div>
        Aucun article disponible
    </div>
  <?php endif; ?>
</section>