<?php
	// read_single_entry.func.php

	/*
		this function check whether entry exist in db or not

		function read_db_single($from_col,$key,$key_col,$table)

		$from_col=from which column the data has to be readed
		$key=Key against row has to bew readed
		$key_col=column of key to matach	
		$table=table 

		return trun if entry exist
		
		it return false if no record found or some error occurs (error details iff debug is active)
	*/

	function read_db_single($from_col,$key,$key_col,$table)
	{
		include '/dbms/dbms_imp.php';

		$check_query="SELECT '$from_col' FROM '$table' WHERE `$key_col`='$key'";
		$query_run=$connection->query($check_query);

		if ($query_run) 
		{
			$query_num_rows=$query_run->num_rows;
			mysqli_close($connection);
			if ($query_num_rows==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else (!$query_run && $debug)
		{
			return mysqli_error();
		}
	}
?>