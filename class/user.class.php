<?php
	//user class
	/*
		user base class

		contains the details of the user specified by the id

		Table structure for table userdetail

		|-------------------------------------------|
		|Column		|Type		|Null	|Default 	|
		|-------------------------------------------|
		|uniqueid	|int(11)	|No		|			|
		|usn		|varchar(11)|No		|			|
		|password	|varchar(65)|No		|			|
		|firstname	|varchar(40)|No		|			|
		|surname	|varchar(40)|No		|			|
		|gender		|varchar(2)	|No		|			|
		|dob		|date 		|No		|			|
		|pos 		|varchar(20)|No		|			|
		|level		|varchar(10)|No		|user 		|
		|-------------------------------------------|


	*/
	class user 
	{
		public $uid;		// user id
		public $usn;		// user usn
		public $fname;		// user first name
		public $lname;		// user last name
		public $gender;		// user gender
		public $dob;		// user data-of-birth
		public $pos;		// user position
		public $level; 		// user level
		public $pic;		// user image (pic)

		public function get_user($id)
		{
			// opening the database connection 
			include 'dbms/dbms_imp.php';

			$this->uid=$id;
			$resultb=$connection->query("SELECT * FROM `userdetail` WHERE `uniqueid`='$id'");
            $rowsuser=$resultb->fetch_array();
            $this->usn=$rowsuser[1];
            $this->fname=$rowsuser[3];
            $this->lname=$rowsuser[4];
            $this->gender=$rowsuser[5];
            $this->dob=$rowsuser[6];
            $this->status=$rowsuser[7];
            $this->level=$rowsuser[8];
            $this->pic=$rowsuser[9];

            //close the database connection 
            mysqli_close($connection);
		}
	}
?>