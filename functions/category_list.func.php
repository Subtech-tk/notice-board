<?php
	// category_list.func.php
	
	/*
		this function defines the array which contains the array of categories defined in databse 
		
		output = array 
	*/
	function category_list()
	{
		$array = array('Birthday','General','Placement');
		
		asort($array);
		
		return $array;
	}

	/*
		this function defines the array which contains the pirorty 
	*/
	function pirorty_list()
	{
		$array = array('Not at all Important','Little bit Important','Very Much Important');
		
		asort($array);
		
		return $array;
	}

?>