<?php
require_once 'lib/com/google/account/openid.php';
require_once 'lib/com/google/account/const.php';
session_start();
if(isset($_SESSION['identity'])) {
	?><a href="<?php echo $LOGOUT_URL ?>">Logout</a><?php
}else{
$openid = new LightOpenID($URL);
$openid->identity = 'https://www.google.com/accounts/o8/id';
$openid->required = array(
'namePerson/first',
'namePerson/last',
'contact/email',
);
$openid->returnUrl = $RETURN_URL;
?>

<a href="<?php echo $openid->authUrl() ?>">Login with Google</a>
<?php
}
?>