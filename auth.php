<?php
require_once 'lib/com/google/account/openid.php';
require_once 'lib/com/google/account/const.php';
$openid = new LightOpenID($URL);
 
if ($openid->mode) {
    if ($openid->mode == 'cancel') {
        echo "User has canceled authentication !";
    } elseif($openid->validate()) {
    	session_start(); 
        $data = $openid->getAttributes();
        $email = $data['contact/email'];
        $first = $data['namePerson/first'];
        echo "Identity : $openid->identity <br>";
        echo "Email : $email <br>";
        echo "First name : $first";
		 $_SESSION['identity'] = $data['contact/email'];
		 echo "<br>".$_SESSION['identity'];
    } else {
        echo "The user has not logged in";
    }
} else {
    echo "Go to index page to log in.";
}
?>