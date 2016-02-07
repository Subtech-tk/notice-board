<?php
	//index.php
  $page_name="index.php";
	
	$title="Index";
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
              include_once 'display/functions/get_image.func.php';
              include_once 'display/functions/otr.func.php';
              include_once 'display/functions/amazing.func.php';
              
              $result=$connection->query("SELECT `id` FROM `notice`");  
              $count=$result->num_rows;
              if ($count==0) 
              {
                amazing('OOPs no notices are there',"no notice exist as this is in development mode","#");
              }
              
              $i=1;
              while ($rows=$result->fetch_array())
              { 
                $notice= new notice($rows[0]);
                otr("$notice->title","$notice->bref","entry.php?ref=".$rows[0]);
              }
         ?> 
        </div>
    <?php
    	require 'footer.php';
    ?>
      </main>
    </div>
</div>
</body>
<?php
	require 'script.php';
?>
</html>