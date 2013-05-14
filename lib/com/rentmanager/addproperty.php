<?php
include_once 'rentmanager.php';
if(isset($_POST['email']))
{
	$data = new StdClass();
	$data->email = stripslashes($_POST['email']);
	$data->name = stripslashes($_POST['name']);
	$data->address = stripslashes($_POST['address']);
	$data->postcode = stripslashes($_POST['postcode']);
	$data->rent = stripslashes($_POST['rent']);
	$data->mortgage = stripslashes($_POST['mortgage']);
	$data->other = stripslashes($_POST['other']);
	
	$rentManager = new RentManager();
	$rentManager->storeProperty($data);
	echo "status=1";
}else{
	echo "status=-1";
}


?>