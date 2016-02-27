<?php
  //user.php
  $page_name="user.php";

  include 'core.php';

  $current_user = new user ;
  $current_user->get_user($userid);

  $title=$current_user->fname;
  $keywords=$current_user->fname."page";
  $description=$current_user->fname."page";
 
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
            // user page only iff he/she is logged in
            if (!islogin())   //if user is not loged in prompt login
            {
              //echo "You need to be loged in to post a notice. <br/> Login here <a href=\"login\">Login</a>";
              include_once 'display/functions/login.func.php';
              login('You need to be logged.');
            }
            elseif ($current_user->level=='dev')   
            {     //display the user 
            ?>
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">

            <style>
              <?php
                if ($current_user->pic == 'NULL')
                {
                  $image="images/road_big.jpg";
                  $height='300';
                }
                elseif (isset($current_user->pic) && !empty($current_user->pic))
                {
                  $image="images/uploads/user".$current_user->pic;
                  list($width, $height) = getimagesize("$image");
                }
              ?>

              .demo-blog--blogpost .demo-blog__posts > .mdl-card .mdl-card__media 
              {
                /*background-image: url(<?php echo "$image" ?>);*/
                height: <?php echo $height."px"; ?>;
              }
            </style>
            <div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url(<?php echo "$image"; ?>)">
                <h3><?php echo $current_user->fname; ?></h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <!--<div class="minilogo"></div>-->
              <div>
                <strong><?php echo "Welcome Back"; ?></strong>
                <span></span>
              </div>
              <div class="section-spacer"></div>
            </div>
            
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <p>
              <pre><?php echo "Dash Board <br/> Please suggest me few functions of dashboard. <br/> ";?></pre>
              </p>
            </div>
            
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <?php
                // expanding the functions
              ?>
            </div>
          </div>
            <?php
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
    <?php
    //any link
    ?>
    <script src="material.min.js"></script>
  </div>
</body>
</html>
