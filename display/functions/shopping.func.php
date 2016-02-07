<?php
	//shopping.func.php
	/*
		this function output the shopping style of card display

		prototype
		function shopping($heading='heading',$content='content goes here',$link='index.php')

		$heading= text which will be displayed like heading
		$content= content of the display to be display
		$link=	URL to ling the card 
	*/

	function shopping($heading='heading',$content='content goes here',$link='#')
	{
		# code...
?>

<div class="mdl-card shopping mdl-cell mdl-cell--12-col">
	<style>
		.demo-blog .shopping .mdl-card__media 
		{
		  background-image: url('images/shopping.jpg');
		}
	</style>
	<div class="mdl-card__media mdl-color-text--grey-50">
		<h3><a href=<?php echo "\"$link\"";?>><?php echo "$heading";?></a></h3>
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