<?php
  // birthday.php
  /*
    this function output the birthday card for user

    prototype
    function birthday($uid)

    $uid = get the user datail using uid
  */

  function birthday($uid)
  {
    $user = new user;
    $user->get_user($uid);
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
                <h3><?php echo "Happy Birthday ".$user->fname  ?></h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <strong><?php echo "Many-Many Happy returns of the Day"; ?></strong>
                <span><?php echo "By - Notice Board Team"?></span>
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
                <?php echo "TADAA.. Happy birthday!<br/> 
                  Quick!Blow the candle and make your wish!</br> 
                  Smile while you still have teeth.. </br>
                  Every birthday presents a new page in your life.Keep doing good and filling that page with good deeds..</br>
                  <br/>Birthdays are good for health.Studies shows people who have more birthdays live longer :-p";?>
              </p>
            </div>

            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              
              <div class="section-spacer"></div>
              <div>
                <strong><?php echo "We wish you a Happy Birthday (3X), and a whole lot of cake ;).";?>
                </strong>
              </div>
            </div>
          </div>
<?php
  }
?>
