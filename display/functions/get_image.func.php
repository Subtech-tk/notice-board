<?php
	// get_image.func.php
	/*
		a function to get the image realted to the content

		$key= key word to search the image
	*/

	function get_image($key)
	{
		# code...
		if ($key=='Web Development') 
		{
			$key='web';
		}
		$image='images/'.$key.'.jpg';

		return $image;
	}
?>
