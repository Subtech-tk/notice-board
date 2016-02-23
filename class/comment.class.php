<?php
	// comment.class.php

	/*
		this is comment class extends user class to get user related to that comment
	*/
	class comment extends user
	{
		public $cid;				// birthday comment id
		public $userid;				// user who commented
		public $nid;				// notice on which its commented
		public $comment;			// comment text
		public $dated;				// commnet dated
		public $timed;				// commnet timed

		public function __construct($ids)
		{
			// opening the database connection 
			include 'dbms/dbms_imp.php';
			
			$this->user_bd=$ids;
			
			$resultc=$connection->query("SELECT * FROM `comments` WHERE `cid`='$ids'");
			
			$rows=$resultc->fetch_array();

				$this->bcid=$rows[0];
				$this->userid=$rows[1];
				$this->nid=$rows[2];
				$this->comment=$rows[3];
				$this->dated=$rows[4];
				$this->timed=$rows[5];

			 //close the database connection 
            mysqli_close($connection);

            // to get user details 
        	$this->get_user($this->userid);
		}

		public function get_comment($ref,$com)
		{
			$this->userid=$_SESSION['user'];
			$this->nid=$ref;
			$this->comment=$com;
			$this->dated=date('Y-m-d');	//to get the current system date time r will give day date time and timezone.
			$this->timed=date('H:i:s');
		}

		public function check_exist()
		{
			# code...
			// add the code to check wether the comment exist or not
			// also to prevent spamming and recursive adding same comment
		}

		public function add_comment()
		{
			$sql = "INSERT INTO `comments` (`cid`, `userid`, `nid`, `comment`, `date`,`timed`) 
				VALUES ('', '$this->userid', '$this->nid', '$this->comment', '$this->dated','$this->timed');";

			include 'dbms/dbms_imp.php';
			$mysql_query_run=$connection->query($sql);	//data adding query
			if (!$mysql_query_run) 
			{
				echo "Error adding the comment".mysqli_error($connection);
			}
			mysqli_close($connection);

			$current_file=$_SERVER['SCRIPT_NAME'];
			header('location:'.$current_file.'?ref='.$this->nid); 	//to redirect to current page
		}
	}
?>