<div id="login-page"> 
  <form method="POST" action="<?php /*echo path('verification_user'); */?>" id="login-form">
    <div>
      <h1>Connexion</h1>
      <?php foreach(getNotifs('error') as $notif) : ?>
            <div class="notif error">
                <span class="notif-icone"></span>
                <div class="notif-titre">Erreur:</div>
                <?php echo $notif; ?>
            </div>
        <?php endforeach; ?>
      
      <div class="group">       
        <div class="input">
          <i class="fa fa-user"></i><input type="text" name="_email" placeholder="Identifiant">
        </div>
        <div class="input">
          <i class="fa fa-lock"></i><input type="password" name="_password" placeholder="Mot de passe" />    
        </div>
        <!-- <div>       
          <input type="checkbox" name="_remember_me" class="on-off" id="on-off">
          <label for="on-off"></label>
          <span>Se souvenir ?</span>
        </div> -->
        <div><a href="<?php echo path('forget_password');?>" class="link">Mot de passe oublié</a></div>
        <div><a href="<?php echo path('inscription');?>" class="link">S'inscrire</a></div>
      </div>

      <div class="button input"><input type="submit" value="Connexion"></div>
      <a href="<?php echo path('site'); ?>" class="button">Retour au site</a>
    </div>    
  </form>
</div>