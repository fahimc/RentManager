<?php
include_once 'rentmanager.php';
if(isset($_POST['p_email']))
{
	$data = new StdClass();
	$data->email = stripslashes($_POST['p_email']);
	$data->name = stripslashes($_POST['p_name']);
	$data->address = stripslashes($_POST['p_address']);
	$data->postcode = stripslashes($_POST['p_post']);
	$data->rent = stripslashes($_POST['p_rent']);
	$data->mortgage = stripslashes($_POST['p_mort']);
	$data->other = stripslashes($_POST['p_other']);
	
	$rentManager = new RentManager();
	$rentManager->storeProperty($data);
	$data = $rentManager->getProperties();
	echo "<script> top.PropertyView.onPropertyStored(".$data.");</script>";
}else{
	echo "status=-1";
}


?>