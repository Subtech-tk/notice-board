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
			$d1=date_create(date('Y-m-d'));
			$d2=date_create($dated[0]);
			
			$d_f=date_diff($d1,$d2);
			
			if ($d_f->d==1) 
			{
				$date='Yesterday';
			}
			elseif ($d_f->d<7) 
			{
				$date=$d_f->d." days ago";
			} 
			else 
			{
				$date = $dated[0];
			}	
		}

		return $date;
	}
?>
