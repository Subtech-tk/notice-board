<?php
	//next.nav.func.php

	/*
		dispaly the net navigation arrow with link to next page

		prototype

		function next_nav($link)

		$link= url to next link

	*/
	function next_nav($link='#')
	{
		# code...
?>

	<nav class="demo-nav mdl-cell mdl-cell--12-col">
            <div class="section-spacer"></div>
            <a href=<?php echo "\"$link\"";?> class="demo-nav__button" title="show more">
              More
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_forward</i>
              </button>
            </a>
          </nav>

<?php
	}
?>