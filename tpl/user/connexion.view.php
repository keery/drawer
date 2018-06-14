<div id="login-page"> 
  <form method="POST" action="<?php /*echo path('verification_user'); */?>" id="login-form">
    <div>
      <h1>Administration</h1>
      <!-- {% if error %}
        <div class="alert alert-danger">{{ error.message }}</div>
      {% endif %} -->
      
      <div class="group">       
        <div class="input">
          <i class="fa fa-user"></i><input type="text" name="_username" placeholder="Identifiant">
        </div>
        <div class="input">
          <i class="fa fa-lock"></i><input type="password" name="_password" placeholder="Mot de passe" />    
        </div>
        <!-- <div>       
          <input type="checkbox" name="_remember_me" class="on-off" id="on-off">
          <label for="on-off"></label>
          <span>Se souvenir ?</span>
        </div> -->
        <div><a href="<?php echo path('forget_password');?>">Mot de passe oublié</a></div>
        <div><a href="<?php echo path('inscription');?>">S'inscrire</a></div>
      </div>

      <div class="button input"><input type="submit" value="Connexion"></div>
      <a href="<?php echo path('site'); ?>" class="button">Retour au site</a>
    </div>    
  </form>
</div>