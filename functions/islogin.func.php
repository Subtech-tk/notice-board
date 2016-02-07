<?php
	//islogin.func.php
	/*
		function to check wether user is loged in or not 
	*/

	function islogin()
	{
		if (isset($_SESSION['user']) && !empty($_SESSION['user']))
		{
			return true;
		} 
		else 
		{
			return false;
		}
		
	}
?>

