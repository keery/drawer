<div>
    <article class="article col-sm-8">
      <div class="header">
        <h1><?php echo $current_page->getTitre(); ?></h1>
      </div>
      <div class="u-pd--m relative">
        <?php foreach(getNotifs('valid') as $notif) : ?>
            <div class="notif valid">
                <span class="notif-icone"></span>
                <div class="notif-titre">Réussi:</div>
                <?php echo $notif; ?>
            </div>
        <?php endforeach; ?>
        <?php foreach(getNotifs('error') as $notif) : ?>
            <div class="notif error">
                <span class="notif-icone"></span>
                <div class="notif-titre">Erreur:</div>
                <?php echo $notif; ?>
            </div>
        <?php endforeach; ?>
        
        <?php if($current_page->getDescription()) echo "<p>".$current_page->getDescription()."</p>"; ?>
      </div>
    </article>
</div>