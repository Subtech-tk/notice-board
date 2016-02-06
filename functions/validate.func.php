<?php
	//validate.func.php

	/*
		a function to validate the data type submited by form or the urls
	*/

	function validate_email($value)
	{
		// Remove all illegal characters from email
		$value = filter_var($value, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) 
		{
		    return true;		//email is a valid email address
		}
		else
		{
		    return false;		//$email is not a valid email address
		}
	}

	function validate_name($value)
	{
		
	}
?>
