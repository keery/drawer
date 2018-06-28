<div class="container-grid wrapper">
  <div class="row">
    <h2>Mes oeuvres</h2>

    <div class="row">
      <?php if(isset($articles) && sizeof($articles) > 0): ?>
        <?php foreach($articles as $article): ?>
          <div class="col-md-4 col-sm-6 col-xs-12 u-pd--s">
            <a href="<?php echo path('site_article_detail', ['name' => $article->getTitre(), 'id' => $article->getId()]); ?>">
              <div class="thumbnail">
                <?php 
                  if( sizeof($article->getImages()) > 0) $bg = 'assets/img/upload/'.$article->getImages()[0]->getSrc();
                  else $bg = 'assets/img/no-image.svg';
                ?>
                <div class="photo"><div style="background-image: url(<?php echo $bg; ?>)"></div></div>
                <div class="caption">
                  <h3><?php echo $article->getTitre(); ?></h3>
                  <?php if( $article->getDescription() ) echo '<div>'.strip_tags(truncate($article->getDescription(), 100)).'</div>' ?>
                  <p><button class="button inv" role="button">Plus d'infos</button></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>