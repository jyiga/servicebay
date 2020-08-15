<?php 

class systemUser extends Model{
		private $id;
		private $firstName;
		private $lastName;
		private $dob;
		private $contact;
		private $email;
		private $isActive;
		private $username;
		private $password;


		public function getid()
		{
 		return $this->id;
}

		public function getfirstName()
		{
 		return $this->firstName;
}

		public function getlastName()
		{
 		return $this->lastName;
}

		public function getdob()
		{
 		return $this->dob;
}

		public function getcontact()
		{
 		return $this->contact;
}

		public function getemail()
		{
 		return $this->email;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function getusername()
		{
 		return $this->username;
}

		public function getpassword()
		{
 		return $this->password;
}



	public function setid($id)
		{
		  $this->id=$id;
		}

		public function setfirstName($firstName)
		{
		  $this->firstName=$firstName;
		}

		public function setlastName($lastName)
		{
		  $this->lastName=$lastName;
		}

		public function setdob($dob)
		{
		  $this->dob=$dob;
		}

		public function setcontact($contact)
		{
		  $this->contact=$contact;
		}

		public function setemail($email)
		{
		  $this->email=$email;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function setusername($username)
		{
		  $this->username=$username;
		}

		public function setpassword($password)
		{
		  $this->password=$this->passwordHash($password);
		  //$this->password=md5($password);
		}
		/*
		public function saveDriverUser(tbldriver $driver)
        {
         	 $this->id=$this->getGUID2();
            $this->firstName=$driver->getfirstName();
            $this->lastName=$driver->getlastName();
            $this->dob=$driver->getdob();
            $this->contact=$driver->getcontact();
            $this->email="info@code360ds.com";
            $this->isActive=1;
            $this->username=trim($driver->getcontact());
            $this->password=md5('abc123');
            $this->__saveUnquie("contact='".$driver->getcontact()."'");

        }*/

    public function getGUID2()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
	}
	
	public function passwordHash($pword)
	{
		$ciphering="AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		// Non-NULL Initialization Vector for encryption 
		$encryption_iv = '1234567890123456'; 
		// Store the encryption key 
		$encryption_key = "0781587081"; 
		// Use openssl_encrypt() function to encrypt the data 
		$encryption = openssl_encrypt($pword, $ciphering,$encryption_key, $options, $encryption_iv);
		return  $encryption;

	}

	public function passwordVerification($encryption)
	{
		$ciphering="AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		$decryption_iv = '1234567890123456'; 
		// Store the encryption key 
		$decryption_key = "0781587081"; 
		$decryption=openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $decryption_iv); 
		return $decryption;
	}


} 
 ?>