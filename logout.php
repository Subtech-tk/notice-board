<?php
	include 'core.php';
	session_destroy();

 		header('location: '.$http_referer);
 ?>