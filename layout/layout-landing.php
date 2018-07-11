<!DOCTYPE html>
<html>
	<head lang="fr">
        <link rel="stylesheet" href="<?php echo DIRNAME ;?>/assets/css/dist/style.css">
		<meta charset="UTF-8">
    <base href="<?php echo DIRECTORY; ?>/">
		<title>Creative Drawer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>
    <div id="landing">
      <header>
        <img src="assets/img/logo-creative-drawer.png" alt="Logo Creative Drawer" id="logo">
        <nav class="nav-top row">
          <ul class="main-menu">
            <li>
              <a href="#band">A propos</a>
            </li>
            <li>
              <a href="#creation">Fonctionnalités</a>
            </li>
            <li>
              <a href="#community">Communauté</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>

        </nav>
        <div id="burger" title="Afficher le menu">
          <div class="line l1"></div>
          <div class="line l2"></div>
          <div class="line l3"></div>
        </div>
      </header>

      <div id="slider-home">
       <img src="assets/img/logo-creative-drawer.png" alt="Logo Creative Drawer" id="logo">
        <div class="skew-right">
          <div class="bloc-slider">
            <h1>CMS Creative Drawer</h1>
            <div class="subtitle">Sous titre</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis tempore pariatur ipsum earum, aperiam cupiditate recusandae, quae debitis animi, optio nulla dolores. A molestiae tempora, assumenda asperiores itaque, officiis sint.</p>
            <a class="btn u-mgt--s" href="/index.rar" download>Débuter</a>
          </div>
        </div>
        <a href="#band" class="chevron-down" title="Descendre à la partie inférieur"></a>
      </div>

      <div id="band" class="border-landing overlay">
        <div class="u-tac text-band">
          <h2>Ma grosse baseline</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore facilis quae, optio, soluta eligendi nostrum, eveniet doloremque, asperiores tempora est deserunt delectus placeat. Voluptatibus eaque officia dolore, quidem rerum dolorem.</p>
          <button class="btn op">Débuter</button>
        </div>
      </div>

      <section id="creation">
        <div class="container-grid">
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <h2>Création assistée de site</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam vero ab neque, eligendi minus perferendis iusto, nemo qui voluptatibus maiores tempora id distinctio labore magnam, nesciunt. Eaque, maxime. Beatae, consequatur.</p>
              <div class="text-center-xs"><button class="btn op">Voir plus</button></div>
            </div>
            <div class="col-xs-1"></div>
            <div class="col-md-6 col-xs-12">
              <div class="img-box overlay"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="community" class="border-landing">
        <div class="container-grid">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="img-box overlay"></div>
            </div>
            <div class="col-xs-1"></div>
            <div class="col-md-5 col-xs-12">
              <h2>Une communauté</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam vero ab neque, eligendi minus perferendis iusto, nemo qui voluptatibus maiores tempora id distinctio labore magnam, nesciunt. Eaque, maxime. Beatae, consequatur.</p>
              <div class="text-center-xs"><button class="btn op">Voir plus</button></div>
            </div>
          </div>
        </div>
      </section>
      <section id="contact">
        <div class="container-grid">
          <form action="" method="POST">
            <h2>Contactez-nous</h2>
            <div>
              <label for="titre-contact">Titre</label>
              <input type="text" id="titre-contact">
            </div>
           <div>
              <label for="message-contact">Message</label>
              <textarea id="message-contact"></textarea>
            </div>
            <div class="text-right">
              <input type="submit" value="Envoyer" class="btn">
            </div>
          </form>
        </div>
      </section>
      <footer>
        <img src="assets/img/logo-creative-drawer.png" alt="Logo Creative Drawer" height="64" id="logo-footer">
        <nav id="menu-footer" class="hidden-xs hidden-sm">
          <ul>
            <li>
              <a href="#band">A propos</a>
            </li>
            <li>
              <a href="#creation">Fonctionnalités</a>
            </li>
            <li>
              <a href="#community">Communauté</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
        </nav>
        <div class="mention text-center">Marques déposées Copyright © Creative Drawer - Tous droits réservés</div>
      </footer>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <script src="js/index.landing.js"></script>
	</body>
</html>
