<?php
	// get_date.func.php
	/*
		a function to get the date relative to the current system date

		$dated= key to calculate the date 
	*/

	function get_date($dated)
	{
		# code...
		$dated=explode(' ', $dated);
		if ($dated[0]==date('Y-m-d')) 
		{
			$date = 'Today';
		} 
		else 
		{
			$date = $dated[0];
		}
		
		return $date;
	}
?>
