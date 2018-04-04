<?php

		if (!empty($_POST)) {
			 $txtconfi= '<?php
			 define("TITLE", "'.$_POST['title'].'");
			 define("HOST", "'.$_POST['Host'].'");
			 define("DB_NAME", "'.$_POST['DBName'].'");
			 define("USER", "'.$_POST['User'].'");
			 define("PASS", "'.$_POST['DBPWD'].'");

				';

				file_put_contents(CONF.'config.php', $txtconfi, FILE_APPEND | LOCK_EX);
				header("refresh:0");
		}
?>
<!DOCTYPE html>
<html>
	<head lang="fr">
		<link rel="stylesheet" href="assets/css/dist/style.css">
		<meta charset="UTF-8">
		<title>Creative</title>
		<base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	</head>
	<body>


	<div id="installer" class="u-pd--m">
    <form  method="post" class="form u-pd--l container-grid">
      <div>
        <h1 class="u-mgt--0">Database</h1>
        <input required type="text" name="DBName" class="input u-mw u-mgb--m" placeholder='Database name'>
        <input required type="text" name="Host" class="input u-mw u-mgb--m" placeholder='Host'>
        <input required type="text" name="User" class="input u-mw u-mgb--m" placeholder='User'>
        <input required type="text" name="DBPWD" class="input u-mw u-mgb--m" placeholder='Password'>
        <input required type="text" name="title" class="input u-mw u-mgb--m" placeholder='Website title'>
      </div>
      <div>
        <h1>Your profile</h1>
        <input required type="text" name="Name" class="input u-mw u-mgb--m" placeholder='Name'>
        <input required type="text" name="LastName" class="input u-mw u-mgb--m" placeholder='Last name'>
        <input required type="text" name="Email" class="input u-mw u-mgb--m" placeholder='Email'>
        <input required type="text" name="Password" class="input u-mw u-mgb--m" placeholder='Password'>
        <input required type="text" name="CPassword" class="input u-mw u-mgb--m" placeholder='Confirm password'>
        <input required type="submit" value="Submit" class="button u-mw btn-validate">
      </div>
    </form>
	</div>




	<script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
	<script src="js/index.js"></script>
	</body>
</html>
