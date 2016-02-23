<?php
  //login.php
  $page_name="Register.php";

  $title="Join us";
  
  $keywords="Join";

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
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <style>
              .demo-blog--blogpost .demo-blog__posts > .mdl-card .mdl-card__media 
              {
                background-image: url('images/join_us.jpg');
                height: 400px;
              }
            </style>
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3>Join us</h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <p>
                <!--login forum-->
                <!-- Simple Textfield -->
            <?php

              include 'core.php';
              include_once 'functions/check_db_entry.func.php';

              $fname=$_POST['fname'];
              $lname=$_POST['lname'];
              $gender=$_POST['gender'];
              $dob=$_POST['dob'];
              $usn=$_POST['usn'];
              $password=$_POST['password'];
              $password_re=$_POST['retype_password'];

              $add=false;   //user is not added
              
              // if the post data is set 
              if (isset($fname) && isset($lname) && isset($gender) && isset($dob) && isset($usn) && isset($password) && isset($password_re)) 
              {
                if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($dob) && !empty($usn) && !empty($password) && !empty($password_re)) 
                {
                  // check both password is same or not

                  $pass=true; //by default checking assume that the data inputed is Valid
                  
                  // validate the data using validate function 

                  // neutralizing the data 
                  include 'dbms/dbms_imp.php';
                  $fname=netutralize($fname,$connection);
                  $lname=netutralize($lname,$connection);
                  $gender=netutralize($gender,$connection);
                  $dob=netutralize($dob,$connection);
                  $usn=netutralize($usn,$connection);
                  mysqli_close($connection);
                  
                  // check for password match
                  if ($password!=$password_re) 
                  {
                    $pass=false;
                  }

                  // if the usn already exists
                  if (read_db_entry($usn,'usn','userdetail')) 
                  {
                    $pass=false;
                    //echo "OOP's It seems the usn already is beign used by someone else." ;
                  }

                  // if all data inputed is correct then give this data to register class to register the user
                  if ($pass) 
                  {
                    $reg_user= new register($password);
                    $reg_user->fname=$fname;
                    $reg_user->lname=$lname;
                    $reg_user->gender=$gender;
                    $reg_user->dob=$dob;
                    $reg_user->usn=$usn;

                    $reg_user->add();
                    //$reg_user->get_userid();
                    //$reg_user->add_password(); 
                    //var_dump($reg_user);
                    
                    //put a redirector to some page 
                    echo "You are Sucessfully Registerd <br/> Login to Continue.";
                    header('location: sucess.php');
                  } 
                } 
                else 
                {
                  echo "It seems You Missed out something";
                }
              }  
            ?>
                <form action="<?php echo $current_file; ?>" method="POST" enctype="" target="">
                  <div class="mdl-textfield mdl-js-textfield">
                    
                    <fieldset>
                      <legend>First Name :
                        <?php 
                          if (isset($fname) && empty($fname)) 
                            {
                              echo "<br/>First Name is missing";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="text" type="text" name="fname" value="<?php if (isset($fname)) {echo "$fname";}?>">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Last Name :
                        <?php 
                          if (isset($lname) && empty($lname)) 
                            {
                              echo "<br/>Last Name is missing";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="text" type="text" name="lname" value="<?php if (isset($lname)) {echo "$lname";}?>">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Gender :
                        <?php 
                          if (isset($gender) && empty($gender)) 
                            { 
                              echo "<br/>Gender is missing";}
                        ?>
                      </legend>
                        <input  id="gender" type="radio" name="gender" value="m" > Male
                        <br>
                        <input  id="gender" type="radio" name="gender" value="f" > Female 
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>How old are You (date of Birth)?:
                        <?php 
                          if (isset($dob) && empty($dob)) 
                            {
                              echo "<br/>Date of Birth is missing";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="dob" type="date" name="dob" value="<?php if (isset($dob)) {echo "$dob";}?>">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>usn :
                        <?php 
                          if (isset($usn) && empty($usn)) 
                            {
                              echo "<br/>usn is missing";
                            } 
                          if (isset($usn) && !empty($usn) && read_db_entry($usn,'usn','userdetail')){
                              echo "OOP's It seems the usn already is beign used by someone else." ;
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="usn" type="text" name="usn" value="<?php if (isset($usn)) {echo "$usn";}?>">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Password :
                        <?php 
                          if (isset($password) && empty($password)) 
                            {
                              $stu='';  
                              if (isset($gender) && !empty($gender)) 
                                { if ($gender=='m') 
                                  {
                                    $stu="Sir,";
                                  }
                                  else if ($gender=='f') 
                                  {
                                    $stu="Madam,";
                                  }
                                } 
                              echo "<br/> $stu We required password to Secure Your Account with Us.";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="password" type="password" name="password" value="">
                    </fieldset>
                    <br/>
                    <fieldset>
                      <legend>Retype Password :
                        <?php 
                          if ($password!=$password_re) 
                            {
                              echo "It seems there is some mistake in Retyping the Password";
                            }
                        ?>
                      </legend>
                      <input class="mdl-textfield__input" id="password" type="password" name="retype_password" value="">
                    </fieldset>
                    <!--<input type="submit" name="log in" value="log in" size="5">-->
                    <!-- Flat button -->
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                    <button class="mdl-button mdl-js-button">
                      Join us
                    </button>
                    </div>
                  </div>
                </form>
                <?php
                  start:echo " ";
                ?>
              </p>
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
