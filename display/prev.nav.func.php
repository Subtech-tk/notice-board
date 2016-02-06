<?php
	//next.nav.func.php

	/*
		dispaly the net navigation arrow with link to previous page

		prototype

		function next_nav($link)

		$link= url to previous link

	*/


	function prev_nav()
	{
		# code...
	$link=$_SERVER['HTTP_REFERER'];
?>
	<div class="demo-back">
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href=<?php echo "\"$link\"";?> title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
        </a>
    </div>

<?php
	}
?>

