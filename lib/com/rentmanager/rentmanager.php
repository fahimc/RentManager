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
}
?>
