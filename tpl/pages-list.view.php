<img src="assets/img/page-picto.svg" alt="" class="picto-page">
<h1>Mes pages</h1>
<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">Published</a>
    <a href="">Drafts</a>
    <a href="">Scheduled</a>
    <a href="">Trashed</a>
  </div>
  <a href="page" class="btn-add" title="Ajouter un élément"></a>
</nav>
<section class="container">
  <ul class="list">
    <li class="list-item">
      <div class="text-list">Mes dessins</div>
      <div class="details-list"><span class="date-details-list">1 month ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php path('article_edit', array('id' => 1)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>
    </li>
    <li class="list-item">
      <div class="text-list">Mes histoires</div>
      <div class="details-list"><span class="date-details-list">2 months ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php path('article_edit', array('id' => 2)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>
    </li>
    <li class="list-item">
      <div class="text-list">Contactez-moi</div>
      <div class="details-list"><span class="date-details-list">3 months ago</span></div>
      <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php path('article_edit', array('id' => 3)); ?>">Éditer</a></li>
          <li><a href="">Supprimer</a></li>
        </ul>
      </span>
    </li>        
  </ul>
</section>