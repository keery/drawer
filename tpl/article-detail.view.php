<img src="assets/img/article-picto.svg" alt="" class="picto-page">
<h1>Comment améliorer son dessin en 3 semaines</h1>
<section class="container group">
  <div class="bloc">
    <div class="bloc-titre">
      <span>Informations</span>
    </div>
    <div class="bloc-content">
      <div class="row spacing">
        <div class="group col-xs-6">
          <label>Titre</label>
          <input type="text" class="input">
        </div>
        <div class="col-xs-6">
          <label>Catégorie</label>
          <input type="text" class="input">
        </div>
      </div>
    </div>
  </div>
</section>  

<section class="container group">
  <div class="bloc">
    <div class="bloc-titre">
      <span>Contenu</span>
    </div>
    <div class="bloc-content">
      <textarea></textarea>
    </div>
  </div>
</section>  

<section class="container group">
  <div class="bloc">
    <div class="bloc-titre">
      <span>Fichiers</span>
    </div>
    <div class="bloc-content">
      <input type="hidden" name="id_entity" value="">
      <input type="hidden" name="id_files" id="id_files">
      <div class="input-form">
        <input type="file" id="actualite_image_image" name="actualite[image][image]" class="input-file">
        <button class="btn-validate button" type="button">Choisir un fichier</button>
      </div>
      <div class="dropzone" data-message="Déposer votre fichier ici"></div>
      <ul class="img-list">      
        <li style="display: none">
          <div class="col-2 photo"></div>
          <div class="panel-action">
            <button class="delete button btn-icone dial" type="button" title="Supprimer l'image" data-id=""></button>
          </div>
            <div class="col-2 img-input">
            <div class="input-form">
              <label for="actualite_image_alt">Alt</label>
              <input type="text" id="actualite_image_alt" name="actualite[image][alt]" class="input">
            </div>
            <div class="input-form">
              <label for="actualite_image_title">Title</label>
              <input type="text" id="actualite_image_title" name="actualite[image][title]" class="input">
            </div>
          </div>
          <div class="position">
              <i class="fa fa-sort"></i>
              <input type="text" id="actualite_image_position" name="actualite[image][position]">
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
<div class="text-right text-center-xs col-xs-12">
  <a href="" class="button btn-validate">Retour à la liste</a>         
  <input type="submit" value="Enregistrer" class="button btn-validate">          
</div>