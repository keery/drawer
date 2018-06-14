<div id="login-page"> 
  <form method="POST" action="<?php echo path('forget_password'); ?>" id="login-form">
    <div>
      <h1>Mot de passe oublié</h1>
        <?php foreach(getNotifs('error') as $notif) : ?>
            <div class="notif error">
                <span class="notif-icone"></span>
                <div class="notif-titre">Erreur:</div>
                <?php echo $notif; ?>
            </div>
        <?php endforeach; ?>
        <?php foreach(getNotifs('valid') as $notif) : ?>
          <div class="notif valid">
              <span class="notif-icone"></span>
              <div class="notif-titre">Réussi:</div>
              <?php echo $notif; ?>
          </div>
        <?php endforeach; ?>
      
      <div class="group">   
        <label>Adresse email</label>
        <div class="input">
            <i class="fa fa-user"></i><input type="text" name="_email" placeholder="Adresse email" required>
        </div>
      </div>

      <div class="button input"><input type="submit" value="Confirmer"></div>
      <a href="<?php echo path('site'); ?>" class="button">Retour au site</a>
    </div>    
  </form>
</div>