<?php
include_once 'rentmanager.php';
if(isset($_POST['r_email']))
{
	$data = new StdClass();
	$data->email = stripslashes($_POST['r_email']);
	$data->desc = stripslashes($_POST['r_desc']);
	$data->total = stripslashes($_POST['r_total']);
	$data->pday = stripslashes($_POST['r_paiddate_day']);
	$data->pmon = stripslashes($_POST['r_paiddate_month']);
	$data->pyear = stripslashes($_POST['r_paiddate_year']);
	$data->tid = stripslashes($_POST['r_tenantid']);
	
	$rentManager = new RentManager();
	echo $rentManager->storeRent($data);
	$data = $rentManager->getProperties();
	echo "<script> top.TenantView.onPropertyStored(".$data.");</script>";
}else{
	echo "status=-1";
}


?>