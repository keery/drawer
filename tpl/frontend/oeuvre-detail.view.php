<div>
    <article class="article col-sm-8">
      <div class="header">
        <h1><?php echo $article->getTitre(); ?></h1>
      </div>
      <div class="u-pd--m">
        <?php if($article->getAuteur()) echo "<i class='author'>Oeuvre de ".$article->getAuteur()."</i>"; ?>
        <?php if($article->getDescription()) echo "<p>".$article->getDescription()."</p>"; ?>
      </div>
      <?php if(count($article->getImages()) > 0): ?>
        <div class="text-center spacing">
            <?php foreach($article->getImages() as $img): ?>
                <div class="img-container">
                    <img src="<?php echo UPLOAD.$img->getSrc(); ?>" />
                </div>                
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="spacing text-right spacing-v">
        <a href="<?php echo path("oeuvre"); ?>" class="button inv">Retour à la liste</a>
      </div>
    </article>
</div>