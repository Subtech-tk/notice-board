<?php
	//register.class.php

	include_once 'traits/password.trait.php';
	/*
		it is class used for the registration of user

		public $uid;		// user id
		public $usn;		// user usn
		public $fname;		// user first name
		public $lname;		// user last name
		public $gender;		// user gender
		public $dob;		// user data-of-birth
		public $pos;		// user position
		public $level; 		// user level
	*/
	class register extends user
	{
		
		private $password;

		// including password trait methods
		use password;

		function __construct($password1)
		{
			$this->password=$password1;
			unset($password1);
		}

		public function add()			// function to add data to database without password
		{
			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `userdetail` (`uniqueid`, `usn`, `password`, `firstname`, `surname`, `gender`, `dob`, `pos`) 
				VALUES ('','$this->usn','','$this->fname','$this->lname','$this->gender','$this->dob','')";
			
			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
			
			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error writing data".mysqli_error($connection);
			}
			else
			{
				$this->get_userid();
				$this->add_password();
			}

		}

		public function get_userid()	// function to get userid back
		{
			include 'dbms/dbms_imp.php';
			
			$sql= "SELECT `uniqueid` FROM `userdetail` WHERE `usn`='$this->usn';";
			
			$mysql_query_run=$connection->query($sql);
			
			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error getting data".mysqli_error($connection);
			}
			else
			{
				$rows=$mysql_query_run->fetch_array();
				$this->uid=$rows[0];
			}
		}

		public function add_password()	// function to add the password to corresponding userid
		{
			$this->password=$this->password_hash_gen($this->usn,$this->password,$this->uid);

			include 'dbms/dbms_imp.php';

			$sql = "UPDATE `userdetail` SET `password` = '$this->password' WHERE `uniqueid` = '$this->uid'";
			
			$mysql_query_run=$connection->query($sql);

			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error writing data".mysqli_error($connection);
			}
		}


	}
?>