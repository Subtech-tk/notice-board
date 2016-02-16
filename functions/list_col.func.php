<?php
	// list_col.func.php

	// create a category list using database
	
	/*
		this function read the different element in the provided column of the particular table 
		$col = column which has to be readed
		$table = table from which the column has to be readed

		returns a array containing the different items related to the column 
	*/
	function list_col($col,$table)
	{
		include "dbms/dbms_imp.php";
		$sql_query="SELECT DISTINCT `cat` FROM `notice`";
		$result=$connection->query($sql_query);
      	$count_rows=$result->num_rows;
      	if ($count_rows==0) 
      	{
      		// code to handle if there is noting in the table
      	}
      	//close the database connection 
        mysqli_close($connection);
        // return the array created by the database
        return $result;
	}
?>