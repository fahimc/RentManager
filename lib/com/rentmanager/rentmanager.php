<?php
include_once 'db/db.php';
class RentManager
{
	private $connection;	
	public function checkUser($email)
	{
			$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
			   $found = false;
			// Check connection
			if (mysqli_connect_errno($this->connection))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  /* Create table doesn't return a resultset */
			  $qstr = "SELECT * FROM ".TABLE::USER." WHERE ".FIELD::USER_EMAIL." = '".$email."'";
			  $result =$this->connection->query($qstr);
			 if($result) 
			 {
			 	if ($result->num_rows>0) {
			   		$found= true;
			 	}
				 /* close result set */
    			$result->close();
			 }
			 
			
			mysqli_close($this->connection); 
			return $found;
	}
	public function storeUser($email,$fname,$lname)
	{
		$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
		if (mysqli_connect_errno($this->connection))
	    {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    }
		 $qstr = "INSERT INTO ".TABLE::USER." (".FIELD::USER_EMAIL.", ".FIELD::USER_FIRSTNAME.", ".FIELD::USER_LASTNAME." ) VALUES ('$email', '$fname', '$lname')";
		 if($result =$this->connection->query($qstr)) 
		 {
			 	return true;
		 }
			 return false;
	}
	public function storeProperty($data)
	{
		$hasUser = $this->checkUser($data->email);
		if($hasUser)
		{
			$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
			if (mysqli_connect_errno($this->connection))
	    	{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    	}
		 	$qstr = "INSERT INTO ".TABLE::PROPERTY." (".FIELD::PROPERTY_EMAIL.", ".FIELD::PROPERTY_NAME.", ".FIELD::PROPERTY_ADDRESS.", ".FIELD::PROPERTY_POSTCODE.", ".FIELD::PROPERTY_RENT.", ".FIELD::PROPERTY_MORTGAGE.", ".FIELD::PROPERTY_OTHER." ) VALUES ('$data->email', '$data->name', '$data->address', '$data->postcode', '$data->rent', '$data->mortgage', '$data->other')";
		 	if($result =$this->connection->query($qstr)) 
			{
				return true;
			}
		}
		return false;
	}
	public function storeTenant($data)
	{
		$hasUser = $this->checkUser($data->email);
		if($hasUser)
		{
			$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
			if (mysqli_connect_errno($this->connection))
	    	{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    	}
			$join = $data->jday."/".$data->jmon."/".$data->jyear;
		 	$qstr = "INSERT INTO ".TABLE::TENANT." (".FIELD::TENANT_EMAIL.", ".FIELD::TENANT_FIRSTNAME.", ".FIELD::TENANT_LASTNAME.", ".FIELD::TENANT_JOINDATE.", ".FIELD::TENANT_RENTDATE.", ".FIELD::TENANT_RENT.", ".FIELD::TENANT_OTHER.", ".FIELD::TENANT_PROPERTYID." ) VALUES ('$data->email', '$data->fname', '$data->lname', '$join', '$data->rday', '$data->rent', '$data->other', '$data->id')";
		 	if($result =$this->connection->query($qstr)) 
			{
				return true;
			}
		}
		return false;
	}
	public function getProperties()
	{
		$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
		if (mysqli_connect_errno($this->connection))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  /* Create table doesn't return a resultset */
			  $qstr = "SELECT * FROM ".TABLE::PROPERTY;
			  $result =$this->connection->query($qstr);
			  $data= "[";
			 if($result) 
			 {
			 	$index=0;
			 	 while ($row = $result->fetch_row()) {
			 	 	if($index>0)$data.=",";
			 	 	$data.="{name:'".$row[2]."',address:'".$row[3]."',postcode:'".$row[4]."'".",rent:'".$row[5]."'".",mortgage:'".$row[6]."'".",other:'".$row[7]."'".",id:'".$row[0]."'";
			 	 	$data.=",tenants:[".$this->getTenants($row[1],$row[0])."]}";
			 	 	$index++;
			 	 	}
				 
			 }
			  $data.= "]";
			 	 	return $data;
	
	}
	public function getTenants($email,$id)
	{
		$this->connection = new mysqli(DB::HOST,DB::USER,DB::PASS,DB::DATABASE);
		if (mysqli_connect_errno($this->connection))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  /* Create table doesn't return a resultset */
			  $qstr = "SELECT * FROM ".TABLE::TENANT." WHERE user_email = '$email' AND property_id = '$id'";
			  $result =$this->connection->query($qstr);
			  $data= "";
			 if($result) 
			 {
			 	$index=0;
			 	 while ($row = $result->fetch_row()) {
			 	 	if($index>0)$data.=",";
			 	 	$data.="{firstname:'".$row[2]."',lastname:'".$row[3]."',joindate:'".$row[4]."'".",rentdate:'".$row[5]."'".",rent:'".$row[6]."'".",other:'".$row[7]."'".",id:'".$row[0]."'}";
				 	$index++;
				 }
			 }
			 return $data;
	}
}
?>
