<?php
	//otr.func.php
	/*
		this function output the one the road again style of card display

		prototype
		function otr($heading,$content,$link)

		$heading= text which will be displayed like heading
		$content= content of the display to be display
		$link=	URL to ling the card 
	*/

	function otr($heading='heading',$content='content goes here',$link='#',$images='learn')
	{
		
		if(function_exists('get_image'))
		{
			$image=get_image($images);
		}
?>

<div class="mdl-card on-the-road-again mdl-cell mdl-cell--12-col">
	<style>
		.demo-blog .on-the-road-again .mdl-card__media 
		{
		  /*background-image: url(<?php echo "$image"; ?>) ! important;*/
		  height: 240px ! important;
		}
	</style>
	<div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url(<?php echo "$image"; ?>)">
		<h3><a href=<?php echo "\"$link\"";?>><?php echo "$heading";?></a></h3>
	</div>
	<div class="mdl-color-text--grey-600 mdl-card__supporting-text">
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