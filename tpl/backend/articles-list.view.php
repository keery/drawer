<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Articles</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">Published</a>
    <a href="">Drafts</a>
  </div>
  <a href="<?php echo path('article_add'); ?>" class="btn-add" title="Ajouter un élément"></a>
</nav>
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