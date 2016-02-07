<?php
	include 'core.php';
	session_destroy();

 	if (strcmp($http_referer,"http://localhost/book/userpage")==0)
 	{
 		header('location: ../index');
 	}
 	elseif (strcmp($http_referer,"http://localhost/book/verify_mail")==0)
 	{
 		header('location: ../index');
 	}
 	else
 	{
 		header('location: '.$http_referer);
 	}
 ?>