<?php
	// addnotice.class.php

	/*
		this class is made to add a new notice 
		it inherite the previously declared notice class

	*/

	class addnotice extends notice
	{
		
		function __construct()
		{
			# code...
		}

		public function add_notice($uid)
		{
			$this->get_user($uid);
			$this->uploader=$uid;
			$this->dated=date('Y-m-d H:i:s');
			include 'dbms/dbms_imp.php';

			$insert_query="INSERT INTO `notice` (`id`, `title`, `cat`, `tags`, `bref`, `description`, `piroity`, `exlink`,`img`,`uploader`,`dated`) 
				VALUES ('','$this->title','$this->cat','$this->tags','$this->bref','$this->description','$this->piroity','$this->exlink','$this->img','$this->uploader','$this->dated')";
			
			$mysql_query_run=$connection->query($insert_query);
			
			mysqli_close($connection);
			
			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error writing data".mysqli_error($connection);
			}
			else
			{
				// redirect to somewhere 
				echo "notice added sucessfully"; 	//temp message untill redirect is made
			}
		}
	}
?>