<?php
	// header.php
	/*
		this file contains the header of the body 
		
	*/

?>
<div class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <!--<div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>-->
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3><strong>NOTICE BOARD </strong><small>beta</small></h3>
        </div>
        <!--<div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>-->
        <!--<div class="section-spacer"></div>-->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a href="index" class="mdl-layout__tab is-active">Home</a>
          <?php
            include_once 'functions/islogin.func.php';
            if (islogin()) 
            {
              ?>
              <a href="add_notice" class="mdl-layout__tab">Add Notice</a>
              <a href="logout" class="mdl-layout__tab">Logout</a>
              <?php
            }
            else
            {
              ?>
              <a href="login" class="mdl-layout__tab">Login</a>
              <?php
            }
        ?>
          <!--<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">add</i>
            <span class="visuallyhidden">Add</span>
          </button>-->
        </div>
      </header>
    </div>
</div>
