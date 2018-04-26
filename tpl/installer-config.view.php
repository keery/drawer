
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

