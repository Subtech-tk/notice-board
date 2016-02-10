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
			
			
			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error writing data".mysqli_error($connection);
			}
			else
			{
				// redirect to somewhere 
				echo "Notice added sucessfully"; 	//temp message untill redirect is made
			}
			mysqli_close($connection);
		}

		public function update_notice($ids)
		{
			$this->id=$ids; 	//updating the id of notice

			include 'dbms/dbms_imp.php';

			$update_query="UPDATE `notice` SET `title`='$this->title',`bref`='$this->bref',`description`='$this->description',`exlink`='$this->exlink' WHERE `id` = '$this->id'";
			
			$mysql_query_run=$connection->query($update_query);
			

			if(!$mysql_query_run)
			{
				// error occurs
				echo "<br>Error writing data".mysqli_error($connection);
			}
			else
			{
				// redirect to somewhere 
				echo "Notice Updated sucessfully  "; 	//temp message untill redirect is made
			}
			mysqli_close($connection);
		}
	}
?>