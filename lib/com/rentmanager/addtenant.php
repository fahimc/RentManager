<?php
include_once 'rentmanager.php';
if(isset($_POST['t_email']))
{
	$data = new StdClass();
	$data->email = stripslashes($_POST['t_email']);
	$data->fname = stripslashes($_POST['t_fname']);
	$data->lname = stripslashes($_POST['t_lname']);
	$data->jday = stripslashes($_POST['t_joindate_day']);
	$data->jmon = stripslashes($_POST['t_joindate_month']);
	$data->jyear = stripslashes($_POST['t_joindate_year']);
	$data->rday = stripslashes($_POST['t_rentdate_day']);
	$data->rent = stripslashes($_POST['t_rent']);
	$data->other = stripslashes($_POST['t_other']);
	$data->id = stripslashes($_POST['t_pid']);
	
	$rentManager = new RentManager();
	$rentManager->storeTenant($data);
	$data = $rentManager->getProperties();
	echo "<script> top.DetailView.onPropertyStored(".$data.");</script>";
}else{
	echo "status=-1";
}


?>