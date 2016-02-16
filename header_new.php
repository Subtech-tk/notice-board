<?php
  // this file contains the header deatials of the page
  //  mainly the top hearder bar which contains the    
?>
<!-- Uses a header that contracts as the page scrolls down. -->
<style>
.demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type  {
  padding-right: 0;
}
</style>

<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--waterfall">
    <!-- Top row, always visible -->
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><strong>NOTICE BOARD</strong><small>beta</small></span>
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp">
        </div>
      </div>
    </div>
    <!-- Bottom row, not visible on scroll -->
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index">Home</a>
        <a class="mdl-navigation__link" href="login">Login</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">NOTICE BOARD</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="index">Home</a>
      <a class="mdl-navigation__link" href="login">login</a>
    </nav>
  </div>
  <!--<main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here
      <p>test containts</p>
    </div>
  </main>-->
</div>