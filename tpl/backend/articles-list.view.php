<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Articles</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">Published</a>
    <a href="">Drafts</a>
  </div>
  <a href="article" class="btn-add" title="Ajouter un élément"></a>
</nav>
<section class="container">
  <ul class="list">
    <li class="list-item">
      <div class="text-list">Comment améliorer son dessin en 3 semaines</div>
      <div class="details-list"><span class="date-details-list">3 years ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php echo path('article_edit', array('id' => 1)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>      
    </li>
    <li class="list-item">
      <div class="text-list">Ma première BD enfin disponible</div>
      <div class="details-list"><span class="date-details-list">3 years ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php echo path('article_edit', array('id' => 2)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>      
    </li>
    <li class="list-item">
      <div class="text-list">Ma présentation</div>
      <div class="details-list"><span class="date-details-list">3 years ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php echo path('article_edit', array('id' => 3)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>      
    </li>        
  </ul>
</section>