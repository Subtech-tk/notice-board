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
  $current_user = new user ;
  $current_user->get_user($userid);

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
              <?php
                var_dump($notice);
                if ($notice->img == 'NULL' || empty($notice->img))
                {
                  $image="images/road_big.jpg";
                  $height='300';
                }
                elseif (isset($notice->img) && !empty($notice->img))
                {
                  $image="images/uploads/notices/".$notice->img;
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
                <h3><?php echo $notice->title; ?></h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <strong><?php echo "By- $notice->fname"; ?></strong>
                <span>
                  <?php
                    if (isset($notice->pos) && !empty($notice->pos)) 
                      {
                        echo "$notice->pos";
                      }   
                  ?>
                </span>
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
              <pre><?php echo $notice->description;?></pre>
              </p>
            </div>

            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div>
                <?php
                  if (function_exists('get_date')) 
                  {
                    $dated=get_date($notice->dated);
                    echo "Posted on - $dated";
                  }
                ?>
              </div>
              <div class="section-spacer"></div>
              <div>
                <strong>
                  <?php 
                    if (isset($notice->exlink) && !empty($notice->exlink)) 
                      {
                        echo "For More information Vist <a href=\"$notice->exlink\"> here </a><br/> $notice->exlink";
                      }
                  ?>
                </strong>
              </div>
            </div>
            
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <?php
                // including the comment forum
                
                if (islogin())  //this will work only if user is logged in
                {

                  $comment=$_POST['comment'];

                  //var_dump($comment);

                  if (isset($comment) && !empty($comment)) 
                  {
                    echo "comment is set and not empty";

                    $comobj = new comment;
                    $comobj->get_comment($ids,$comment);
                    $comobj->check_exist();
                    $comobj->add_comment();
                    //var_dump($comobj);
                    //die();
                  }

                }

                // including the comment forum
                include 'display/forms/comment.form.php';
                if (islogin()) 
                {
                  // including the comments 
                  include 'display/functions/comment.func.php';
                  include 'dbms/dbms_imp.php';
                  $resultc=$connection->query("SELECT `cid` FROM `comments` WHERE `nid`='$ids' ORDER BY `cid` DESC");
                  mysqli_close($connection);

                  while ($rows=$resultc->fetch_array())
                  {
                    $comm = new comment($rows[0]);
                    comment($comm);
                  }
                }
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
    <?php
      if (($userid==$notice->uploader) || ($current_user->level=='admin') || ($current_user->level=='dev')) 
      {
    ?>
    <a href="edit_notice?ref=<?php echo $ids; ?>" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast"><?php echo  "Edit This Notice";?></a>
    <?php
      }
    ?>
    <script src="material.min.js"></script>
  </div>
</body>
</html>
