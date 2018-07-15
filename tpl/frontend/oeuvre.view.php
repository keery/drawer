<div class="container-grid wrapper">
    <h2>Mes oeuvres</h2>

    <?php if($current_page->getDescription()):
      echo '<p>'.$current_page->getDescription().'</p>';
    endif; ?>
    
    <?php if(sizeof($categories) > 0): ?>
      <form method="POST">
        <div class="filter-cat">
          <label>Articles par catégorie</label>
          <select class="select" name="filter-cat">
            <option value="">Tous les articles</option>
            <?php foreach($categories as $cat):
              $selected = "";
              if(isset($_POST['filter-cat']) && $_POST['filter-cat'] == $cat->getId()) $selected = "selected";
              echo '<option value="'.$cat->getId().'" '.$selected.'>'.$cat->getNom().'</option>';
            endforeach; ?>
          </select>
          <input type="submit" value="Filtrer" class="button inv">
        </div> 
      </form>
    <?php endif; ?>
    <div class="row">
      <?php if(isset($articles) && sizeof($articles) > 0): ?>
        <?php foreach($articles as $article): ?>
          <div class="col-md-4 col-sm-6 col-xs-12 u-pd--s">
            <a href="<?php echo path('site_article_detail', ['name' => $article->getTitre(), 'id' => $article->getId()]); ?>">
              <div class="thumbnail">
                <?php 
                  
                  if( sizeof($article->getImages()) > 0) {
                    $imgs= $article->getImages();
                    sortObjects($imgs, 'getPosition');
                    $bg = 'assets/img/upload/'.$imgs[0]->getSrc();
                  }
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
      <?php else: ?>
        <div class="col-xs-12">
          <div class="notif information full">
              <span class="notif-icone"></span>
              <div class="notif-titre">Info:</div>
              Il n'y a actuellement aucune oeuvre de publiée
          </div>
        </div>
      <?php endif; ?>
      </div>
    </div>
</div>