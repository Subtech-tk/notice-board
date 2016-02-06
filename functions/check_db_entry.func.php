<?php
	//check_db_entry.func.php
		
	/*
		function to check wether given key exist in database or not
		$key=Key against row has to bew readed
		$key_col=column of key to match	
		$table=table
	*/

	function read_db_entry($key,$key_col,$table)
	{
		include 'dbms/dbms_imp.php';
		//$debug=true;
		$check_query="SELECT * FROM `$table` WHERE `$key_col`='$key'";
		$query_run=$connection->query($check_query);
		if ($query_run) 
		{
			$query_num_rows=$query_run->num_rows;
			
			if ($query_num_rows==1) 
			{
				return true;
			}
			elseif ($query_num_rows==0)
			{
				return false;
			}
			else
			{
				if ($debug) 
				{
					return mysqli_error($connection);
				}

				return false;
			}
		}
		else if (!$query_run && $debug)
		{
			return mysqli_error($connection);
		}
		else
		{
			return false;
		}
	}
?>