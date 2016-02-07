<?php
  //login.php
  $page_name="Login.php";

  $title="Login";
  
  $keywords="Login";

  include 'core.php';
 
?>

<!doctype html>

<html lang="en">
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
    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <!--<div class="demo-back">
          <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="index.html" title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
          </a>
        </div>-->
        <div class="demo-blog__posts mdl-grid">    
          <?php
            if (islogin()) 
            {
            	include 'display/functions/amazing.func.php';
            	amazing($heading='Already loged in',$content='It seems You are alrady loged in.<br/>No need to login Again. :)',$link='#');
            } 
            else 
            {
                //login forum
            	include 'display/functions/login.func.php';
             	login($message='');
          	}
          ?>
          <!--navigation panel for large database-->
        </div>
    <?php
      require 'footer.php';
    ?>
      </main>
      <!--<div class="mdl-layout__obfuscator"></div>-->
    </div>
    <script src="../../material.min.js"></script>
  </div>
</body>
</html>
