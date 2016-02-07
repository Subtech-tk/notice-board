<?php
  //entry.php
  $page_name="entry.php";

  include 'core.php';

  $ids=@$_GET['ref'];
  $ids=htmlentities($ids);

  include 'dbms/dbms_imp.php';
  $ids=netutralize($ids,$connection);
  mysqli_close($connection);

  $notice = new notice($ids);
  
  $title=$notice->title;
  $keywords=$notice->tags;
  $description=$notice->bref;
 
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
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <style>
              .demo-blog--blogpost .demo-blog__posts > .mdl-card .mdl-card__media 
              {
                /*background-image: url('images/road_big.jpg');*/
                height: 100px;
              }
            </style>
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3><?php echo $notice->title; ?></h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <strong><?php echo "By- $notice->fname"; ?></strong>
                <span><?php //only if something else is required echo "Publisher- ".$bookbo->publisher; ?></span>
              </div>
              <div class="section-spacer"></div>
              <div class="meta__favorites">
                <i class="material-icons" role="presentation">favorite</i>
                <span class="visuallyhidden">favorites</span>
              </div>
              <div>
                <i class="material-icons" role="presentation">bookmark</i>
                <span class="visuallyhidden">bookmark</span>
              </div>
              <div>
                <i class="material-icons" role="presentation">share</i>
                <span class="visuallyhidden">share</span>
              </div>
            </div>
            
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <p>
                <?php echo $notice->description;?>
              </p>
            </div>

            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              
              <div class="section-spacer"></div>
              <div>
                <strong><!--any other thing--></strong>
              </div>
            </div>
            
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <?php
                // including the comment forum if reqired in future
              ?>
            </div>
          </div>
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
