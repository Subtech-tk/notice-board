<?php
  // birthday_comment.func.php
  /*
    this function output the birthday card for user so other can wish him/her

    prototype
    function birthday()

    $uid = get the user datail using uid
  */

  function birthday_comment()
  {
?>          
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <style>
              .demo-blog--blogpost .demo-blog__posts > .mdl-card .mdl-card__media 
              {
                /*background-image: url('images/road_big.jpg');*/
                height: 100px;
              }
            </style>
              
            <div class="mdl-card__media mdl-color-text--grey-50">
                <h3><?php echo "Wish your Friend"  ?></h3>
            </div>

            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <?php
                // including the birthday_wish forum
                
                if (islogin())  //this will work only if user is login 
                {

                  $comment=$_POST['comment'];

                  if (isset($comment) && !empty($comment)) 
                  {
                    $comobj = new birthday;
                    $comobj->get_comment($uid,$comment);
                    $comobj->check_exist();
                    $comobj->add_comment();
                  } 
                }

                include 'core.php';
                include 'birthday_wish.form.php';

                // including the comments 
                include 'birthday_wish.func.php';
                include 'dbms/dbms_imp.php';
                $today = date('Y-m-d');
                $resultc=$connection->query("SELECT * FROM `bd_comments` WHERE `date`='$today' ORDER BY `bcid` DESC");

                if (!$resultc) 
                {
                  echo "Comment loading failed".mysqli_error($connection)."<br/> Report it to Developers";
                }

                while ($rows=$resultc->fetch_array())
                {
                  $comm = new birthday($rows[0]);
                  birthday_wish($comm);
                
                }
                mysqli_close($connection);
              ?>
            </div>
          </div>
<?php
  }
?>