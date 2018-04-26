
<?php
$installerConfig = new \InstallerConfig();
$config = $installerConfig->configFormAdd();
$errors = [];
if (!empty($_POST)) {
    $installerConfig->addConfig($_POST);
}
?>

    <?php
    include "module/view/form/form.frm.php";
    ?>

