<?php 
class User {
	
	private $username;
	private $password;
	private $email;
	private $con;
	
	public $aError;
	
	public function __construct( $username, $password, $email ) {
		include "config/config.php";
		$this->con 		 = $connection;
		$this->username  = mysqli_escape_string($this->con, $username);
		$this->password  = mysqli_escape_string($this->con, $password);
		$this->email 	 = mysqli_escape_string($this->con, $email);
		$this->aErorr = "";
	}
	
	public function add( ) {
		$queryAddUser = "INSERT INTO users (email, password, username) VALUES ('".$this->email."','".password_hash($this->password, PASSWORD_BCRYPT)."','".$this->username."');";
		$queryCheckEmail = "SELECT email FROM users WHERE email='".$this->email."' AND deleted=0 ;";
		$queryCheckUser  = "SELECT username FROM users WHERE username='".$this->username."' AND deleted=0;";
		$resultCheckEmail = mysqli_query($this->con, $queryCheckEmail);
		if (mysqli_num_rows($resultCheckEmail))
		{   $this->aError = "That email is already registered";
			return false;
		}
		$resultCheckUser  = mysqli_query($this->con, $queryCheckUser);
		if (mysqli_num_rows($resultCheckUser))
		{   $this->aError = "That username is already registered";
			return false;
		}
		$resultAddUser = mysqli_query($this->con, $queryAddUser);
		if (!$resultAddUser)
		{   $this->aError = "There was an error adding you to the database, please try again later";
			return false;
		}
		return true;
	}
}
