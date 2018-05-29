<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Articles</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="<?php echo path('articles') ?>" <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "articles" ? 'class="selected"' : '') ?>>Tous</a>
    <a href="<?php echo path('articles')."?sort=active"; ?>" <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "articles" ? 'class="selected"' : '') ?>>Publiés</a>
    <a href="<?php echo path('articles')."?sort=unactive"; ?> <?php echo ($_SERVER['CURRENT_ROUTE']['name'] === "articles" ? 'class="selected"' : '') ?>s>Non publiés</a>
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
  <ul class="list">
    <?php foreach($articles as $article) : ?>
      <li class="list-item">
        <div class="text-list"><?php echo $article->getTitre(); ?></div>
        <div class="details-list"><span class="date-details-list"><?php echo format_date($article->getDate_creation(), "d/m/Y"); ?></span></div>
        <span class="btn-edit-item">
          <span></span>
          <ul>
            <li><a href="<?php echo path('article_edit', ['id' => $article->getId()]); ?>">Éditer</a></li>
            <li><a href="">Supprimer</a></li>
          </ul>
        </span>      
      </li>
    <?php endforeach; ?>
  </ul>
</section>