<div id="login-page"> 
  <form method="POST" action="<?php echo path('new_password', ['token' => $token]); ?>" id="login-form">
    <div>
      <h1>Nouveau mot de passe</h1>
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
        <label>Nouveau mot de passe</label>
        <div class="input">
            <i class="fa fa-lock"></i><input type="password" name="password" placeholder="Nouveau mot de passe" required>
        </div>
        <label>Confirmation nouveau mot de passe</label>
        <div class="input">
            <i class="fa fa-lock"></i><input type="password" name="confirm" placeholder="Confirmation" required>
        </div>
      </div>
      <div class="button input"><input type="submit" value="Confirmer"></div>
      <a href="<?php echo path('site'); ?>" class="button">Retour au site</a>
    </div>    
  </form>
</div>