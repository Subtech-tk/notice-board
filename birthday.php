<?php
  //birthday.php
  $page_name="birthday.php";

  include 'core.php';
  $title="Happy Birthday";
  $keywords="Birthday";
  $description="Birthday Wish Page";
 
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
          <!--break from here-->
          <?php
            // getting todays birthday
              include 'dbms/dbms_imp.php';
              $today=date('-m-d');
              // echo "$today";
              // query to get todays birthday
              $query_bd="SELECT `uniqueid` FROM `userdetail` WHERE `dob` LIKE '%$today%'";

              $result=$connection->query($query_bd);  
              $count=$result->num_rows;

              // getting the display functions
              include_once 'display/functions/amazing.func.php';
              include_once 'display/functions/birthday.func.php';
              include_once 'display/functions/birthday_comment.func.php';

              if ($count==0) 
              {
                amazing('OOP\'s no Birthday Today',"a message","#");
              }
              else
              {
                while ($rows=$result->fetch_array())
                { 
                  birthday($rows[0]);
                }

                birthday_comment();
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
    <script src="material.min.js"></script>
  </div>
</body>
</html>
