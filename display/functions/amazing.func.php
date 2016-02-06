<?php
	//amazing.func.php
	/*
		this function output the amazing style of card display

		prototype
		function amazing($heading='heading',$content='content goes here',$link='index.php')

		$heading= text which will be displayed like heading
		$content= content of the display to be display
		$link=	URL to ling the card 
	*/

	function amazing($heading='heading',$content='content goes here',$link='#')
	{
		# code...
?>

<div class="mdl-card amazing mdl-cell mdl-cell--12-col">
	<div class="mdl-card__title mdl-color-text--grey-50">
		<h3 class="quote"><a href=<?php echo "\"$link\"";?>><?php echo "$heading";?></a></h3>
	</div>
	<div class="mdl-card__supporting-text mdl-color-text--grey-600">
		<?php echo "$content";?>
	</div>
	<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
		<!--<div class="minilogo"></div>
		<div>
			<strong>The Newist</strong>
			<span>2 days ago</span>
		</div>-->
	</div>
</div>
<?php
	}
?>