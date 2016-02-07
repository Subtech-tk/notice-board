<?php
	// This file contains the details reqoired to connect to the server so edit this file with utmost care 
$mysql_host="127.0.0.1";		// host of the db server
$mysql_username="root";			// usernmae of the user who have full access to the db server
$mysql_password="";				// password to access that server 
$mysql_db="notice";				// database	
$connection=@mysqli_connect($mysql_host,$mysql_username,$mysql_password);
if(!$connection)
{
	echo "unable to connect to server<br/>".mysqli_connect_error();
	die();
}

$mysql_charset=@mysqli_set_charset($connection,'utf8');
if(!$mysql_charset)
{
	echo "unable to set database connection encoding<br/>".mysqli_connect_error();
	die();
}

$mysql_sdb=@mysqli_select_db($connection,$mysql_db);
if(!$mysql_sdb)
{
	echo "unable to locate database </br>".mysqli_error($connection)."</br>";

	// if database is not created then finding the error and try to correct it automatically
	
	$database_error=mysqli_error($connection);
	
	if ($database_error=="Unknown database '$mysql_db'")	 //	If database does not exist
	{
		//	Create a new database
		$sql_db_create="CREATE DATABASE `notice`;";

		$query_result=$connection->query($sql_db_create);
		if (!$query_result) 
		{
			echo "Please check the configuration  of the server.";
		}
		else
		{
			echo "</br>We found that the database doesnot exists so we created one for you.</br> Refresh this page ";
			die();
		}
	}

}

?>
