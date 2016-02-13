<?php
//ini_set('display_errors','0');	//to be set active when site goes live
// core file must be include in all pages

include 'dbms/dbms_imp.php';
//include_once "functions/";
include_once 'functions/islogin.func.php';
include_once 'display/functions/get_image.func.php';
include_once 'display/functions/get_date.func.php';
include_once 'functions/validate.func.php';
include_once 'functions/netutralize.func.php';


spl_autoload_register(function ($class) 
{
    include 'class/'.$class.'.class.php';
});

ob_start();

// for debuging
	$debug=true;

session_start();

$current_file=@$_SERVER['SCRIPT_NAME'];
$http_referer=@$_SERVER['HTTP_REFERER'];
	//default values
	
	//echo $current_file;

	$userid=@$_SESSION['user'];
?>