<?php
	//index.php
  $page_name="sucess.php";
	
	$title="sucess";
  include 'core.php';
?>
<!doctype html>
<html lang="en-uk">
<?php
	//includind the head tag
	require 'head.php';
?>
<body>
<?php
	// including the header of the document
	require 'header.php';
	// including the blog layout 
?>
<div>
	<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
         <?php
              include_once 'display/functions/amazing.func.php';
               
              amazing('Now you are a part of the team',"Please login to continue","Login");
         ?> 
        </div>
    <?php
      // including the footer
    	require 'footer.php';
    ?>
      </main>
    </div>
</div>
</body>
<?php
  // including the additional script
	require 'script.php';
?>
</html>