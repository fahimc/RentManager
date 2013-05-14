<?php
require_once 'lib/com/google/account/openid.php';
require_once 'lib/com/google/account/const.php';
require_once 'lib/com/rentmanager/rentmanager.php';
$openid = new LightOpenID($URL);
 
if ($openid->mode) {
    if ($openid->mode == 'cancel') {
        echo "User has canceled authentication !";
    } elseif($openid->validate()) {
    	session_start(); 
        $data = $openid->getAttributes();
        $email = $data['contact/email'];
        $first = $data['namePerson/first'];
     //   echo "Identity : $openid->identity <br>";
      //  echo "Email : $email <br>";
      //  echo "First name : $first";
		 $_SESSION['identity'] = $data['contact/email'];
		// echo "<br>".$_SESSION['identity'];
		 
		 //check and save user
		 $rentManager = new RentManager();
		 $hasUser =  $rentManager->checkUser( $data['contact/email']);
		 
		 //check if user exists
		 if(!$hasUser)
		 {
		 	$rentManager->storeUser($data['contact/email'],$data['namePerson/first'],$data['namePerson/last']);
		 }
			header('Location:'.$INDEX_URL ) ;
		 
    } else {
      //  echo "The user has not logged in";
       header('Location:'.$LOGIN_URL ) ;
    }
} else {
   // echo "Go to index page to log in.";
    header('Location:'.$INDEX_URL ) ;
}
?>