<?php 
use Conf\Autoloader;
use Module\Router\Router;
use Module\Entity\User;

use Module\PHPMailer\PHPMailer;
// use Module\PHPMailer\Exception;


require('conf/const.php');
require(CONF.'functions.php');

$loader = require(CONF.'autoload.php');
Autoloader::register();


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('guillaumesnault@gmail.com', 'Mailer');
    $mail->addAddress('mon-compte1131@live.fr', 'Joe User');     // Add a recipient

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
var_dump($mail);
die;
if( isset($_SESSION[PREFIX."user"]['id']) ) {
	$expire = date('Y-m-d H:i:s');
	$user = User::findOneBy(['id' => $_SESSION[PREFIX."user"]['id']]);
	if((isset($_SESSION[PREFIX."user"]['token']) && $user->getToken() != $_SESSION[PREFIX."user"]['token']) || ($user->getExpire() < $expire) ) session_destroy();
	$token = uniqid();
	$_SESSION[PREFIX."user"]['token'] = $token;
	$user->setToken($token);
	$user->setExpire(date('Y-m-d H:i:s', strtotime('+4 hour')));
	$user->save();
}

$router = new Router();
//A décommenter si besoin du 1er form de config
// if (!file_exists(CONF.'config.php')) $URI = "installer-config";

// TO DO need SQL get admin user
//elseif (USERADMINEXISTE?)$URI = "installer-user";
// else {

	$URI = explode("?", $_SERVER["REQUEST_URI"]);
	$URI = $URI[0];
	$URI = str_replace(DIRECTORY, '', $URI);
	if ($URI != DS) $URI = urldecode(substr($URI, 1));
//  }
 $router->urlMatcher($URI);
?>