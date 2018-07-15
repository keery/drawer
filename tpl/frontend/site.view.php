<div class="container-grid wrapper">
  <div class="row">
    <div class="col-sm-8 col-xs-12">
      <article class="article">
        <div class="header">
          <h1><?php echo $current_page->getTitre(); ?></h1>
        </div>
        <div class="u-pd--m">
          <?php if($current_page->getDescription()):
            echo '<p>'.$current_page->getDescription().'</p>';
          endif; ?>
        </div>
      </article>
      <?php if($last_article): ?>
      <article class="article">
        <div class="header">
          <h2>Ma dernière oeuvre</h2>
        </div>
        <div class="u-pd--m">
          <?php echo "<div>".$last_article->getTitre()."</div>"; ?>
          <?php if($last_article->getAuteur()) echo "<i class='author'>Oeuvre de ".$last_article->getAuteur()."</i>"; ?>
          <?php if($last_article->getDescription()) echo "<p>".$last_article->getDescription()."</p>"; ?>
          <?php if(count($last_article->getImages()) > 0): ?>
            <div class="text-center spacing">
                <?php $imgs = $last_article->getImages(); ?>
                  <div class="img-container">
                      <?php echo renderImg($imgs[0]); ?>
                  </div>                
            </div>
          <?php endif; ?>
          <div class="text-right">
            <a href="<?php echo path('site_article_detail', ['name' => $last_article->getTitre(), 'id' => $last_article->getId()]); ?>" class="button btn-validate">Voir plus</a>
          </div>
        </div>
      </article>
      <?php endif; ?>
    </div>
    <article class="description col-sm-4 u-pdl--l">
      <img src="assets/img/hassan.png" alt="">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
    </article>
  </div>
</div>