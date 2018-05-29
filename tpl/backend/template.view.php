<?php
use Module\Entity\InstallerConfig;

$installerConfig = new InstallerConfig();
$config = $installerConfig->configFormAdd();
$errors = [];

if (!empty($_POST)) {
    $installerConfig->addConfig($_POST);
}

include "module/view/form/form.frm.php";
?>

<img src="assets/img/template-brush-black.svg" alt="" class="picto-page">
<h1>Design</h1>
<div id="settings">

    <h2>Style</h2>

    <section class="container padding-box">
        <div class="container-grid">
            <div class="row">

                <div class="col-md-6 col-xs-12 group spacing-left">
                    <label>Couleur Principal</label>
                    <input type="color" name="favcolor" value="#304A52">
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <label>Couleur Secondaire</label>
                    <input type="color" name="favcolor" value="#379085">
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <label>Couleur sous-titre</label>
                    <input type="color" name="favcolor" value="#FFFFFF">
                </div><div class="col-md-6 col-xs-12 group spacing-left">
                    <label>Couleur sous-titre secondaire</label>
                    <input type="color" name="favcolor" value="#D5DCE3">
                </div>
                <div class="col-md-6 col-xs-12 group spacing-left">
                    <label>Couleur Texte </label>
                    <input type="color" name="favcolor" value="#304A52">
                </div>
                <div class="text-right text-center-xs col-md-3 col-xs-12">
                    <input type="submit" value="Enregistrer" class="button btn-validate">
                </div>
            </div>
        </div>
    </section>
</div>