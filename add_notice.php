<?php
	// add_notice.php

  $page_name="add_notice.php";

  $title="Add notice";
  
  $keywords="Add notice";

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
            // user can only post a notice iff he/she is logged in
            if (!islogin())   //if user is not loged in prompt login
            {
              //echo "You need to be loged in to post a notice. <br/> Login here <a href=\"login\">Login</a>";
              include_once 'display/functions/login.func.php';
              login('You need to be logged in to post a notice.');
            }
            else    //display the add notice forum 
            {
            ?>
            <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <style>
              .demo-blog--blogpost .demo-blog__posts > .mdl-card .mdl-card__media 
              {
                background-image: url('images/road_big.jpg');
                height: 300px;
              }
            </style>
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3>Add a new notice</h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <p>
                <!-- Add notice forum -->
            <?php
              include 'core.php';
              include_once 'functions/category_list.func.php';

              // variables for the adding notice
              $title=$_POST['title'];
              $cat=$_POST['cat'];
              $tags=$_POST['tags'];
              $bref=$_POST['bref'];
              $desc=$_POST['desc'];
              $piroity=$_POST['piroity'];   //can be null
              $exlink=$_POST['exlink'];     //can be null
              //$img=$_POST['img'];           //can be null
              
              // if the post data is set 
              if (isset($title) && isset($cat) && isset($tags) && isset($bref) && isset($desc)) 
              {
                if (!empty($title) && !empty($cat) && !empty($tags) && !empty($bref) && !empty($desc)) 
                {
              
                  $pass=true; //by default checking assume that the data inputed is Valid
                  
                  // processing the image only iff data enterend are correct

                  include 'img.proc.php';

                  $img=$fileName;

                  // validate the data using validate function 

                  // neutralizing the data 
                  include 'dbms/dbms_imp.php';
                  $title=netutralize($title,$connection);
                  $cat=netutralize($cat,$connection);
                  $tags=netutralize($tags,$connection);
                  $bref=netutralize($bref,$connection);
                  $desc=netutralize($desc,$connection);
                  if (isset($piroity) && !empty($piroity))  //if piroity field is set
                  {
                    $piroity=netutralize($piroity,$connection);
                  }
                  if (isset($exlink) && !empty($exlink))    //if exlink field is set 
                  {
                    $exlink=netutralize($exlink,$connection);
                  }
                  // image processing is taken care by temp.php
                  mysqli_close($connection);

                  // contitions to check the input data


                  // if all data inputed is correct then give this data to register class to register the user
                  if ($pass) 
                  {
                    $add_notice = new addnotice ;
                    $add_notice->title=$title;
                    $add_notice->cat=$cat;
                    $add_notice->tags=$tags;
                    $add_notice->bref=$bref;
                    $add_notice->description=$desc;
                    if (isset($piroity) && !empty($piroity)) 
                    {
                      $add_notice->piroity=$piroity;
                    } 
                    else
                    {
                      $add_notice->piroity='0';   //0 means low pirority
                    }
                    
                    if (isset($exlink) && !empty($exlink)) 
                    {
                      $add_notice->exlink=$exlink;
                    } 
                    else 
                    {
                      $add_notice->exlink='';     // exlink is set to empty (default value)
                    }
                    
                    if (isset($img) && !empty($img)) 
                    {
                      $add_notice->img=$img;
                    } 
                    else 
                    {
                      $add_notice->img='NULL';      //no image added so rest it to zero
                    }
                    
                    if ($pass)    // add notice iff everything is correct 
                    {
                      $add_notice->add_notice($userid);
                    }
                    else
                    {
                      echo "Sorry, your notice was not added";
                    }

                    //var_dump($add_notice);	// only for testing 
                    
                    //put a redirector to some page 
                  } 
                } 
                else 
                {
                  echo "It seems You Missed out something";
                }
              }  
            ?>
                <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data" target="">
                  <div class="mdl-textfield mdl-js-textfield">
                    
                    <fieldset>
                      <legend>Title :
                        <?php 
                          if (isset($title) && empty($title)) 
                            {
                              echo "<br/>Title is missing";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="title" type="text" name="title" value="<?php if (isset($title)) {echo "$title";}?>">
                    </fieldset>
                    <br/>
                   <fieldset>
                      <legend>Category :
                        <?php
                          if (isset($cat) && empty($cat)) 
                            {
                              echo "<br/>category is missing";
                            }
                        ?>
                      </legend>
                        <select class="mdl-textfield__input" name="cat" size="1">
                          <option value="">select</option>
                      <?php
                        $result=category_list();
                       for ($i=0; $i < count($result); ++$i) 
                       { 
                        ?>
                          <option value="<?php echo strtolower($result[$i]); ?>"><?php echo $result[$i];?></option>
                        <?php
                       }
                      ?>
                        </select>
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Tags (some words related to it for facilate search feature seperated by comma ','):
                        <?php 
                          if (isset($tags) && empty($tags)) 
                            {
                              echo "<br/>Tags is/are missing";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="tags" type="text" name="tags" value="<?php if (isset($tags)) {echo "$tags";}?>">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>briefly describe the notice (in 200 words):
                        <?php 
                          if (isset($bref) && empty($bref)) 
                            {
                              echo "<br/>Brief description is missing";
                            }
                        ?>
                      </legend>
                      <div class="mdl-textfield mdl-js-textfield">
                      <textarea class="mdl-textfield__input" type="text" rows="3" cols="60" id="bref" name="bref" value="<?php if (isset($bref)) {echo "$bref";}?>"><?php if (isset($bref)) {echo "$bref";}?></textarea>
                      </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Description (full description of the notice in 1000 words max):
                        <?php 
                          if (isset($desc) && empty($desc)) 
                            {
                              echo "<br/>Description is missing";
                            } 
                        ?>
                      </legend>
                      <div class="mdl-textfield mdl-js-textfield">
                      <textarea class="mdl-textfield__input" type="text" rows="6" cols="60" id="desc" name="desc" value="<?php if (isset($desc)) {echo "$desc";}?>"><?php if (isset($desc)) {echo "$desc";}?></textarea>
                      </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                    	<legend>Select image to upload:
    					<input type="file" name="img" id="img">
                    	</legend>
                    </fieldset>
                    <fieldset>
                      <legend>Pirorty (optional):
                      </legend>
                        <select class="mdl-textfield__input " name="piroity" size="1">
                          <option value="">select</option>
                      <?php
                        $result=pirorty_list();
                       for ($i=0; $i < count($result); ++$i) 
                       { 
                         echo "<option value=\"".$i."\">".$result[$i]."</option>";
                       }
                      ?>
                        </select>
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>External Link (optional):
                      </legend>
                      <input class="mdl-textfield__input" id="exlink" type="text" name="exlink" value="<?php if (isset($exlink)) {echo "$exlink";}?>">
                    </fieldset>
                    <br/>
                    <!--<input type="submit" name="log in" value="log in" size="5">-->
                    <!-- Flat button -->
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <button class="mdl-button mdl-js-button">
                      Post it
                    </button>
                    </div>
                  </div>
                </form>
              </p>
            </div>   
          </div>
          <!--navigation panel for large database-->
            <?php
              }
            ?>
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
