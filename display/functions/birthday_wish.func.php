<?php
	//birthday_wish.func.php
	/*
		this function output the one the birthday wish section

		prototype
		function birthday_wish($bdobj)

    $cobj=  object of birthday class

    comment class members 

      public $bcid;             // Birthday comment id
      public $userid;           // user who commented
      public $user_bd;          // user whose brthday
      public $comment;          // comment text
      public $dated;            // commnet dated
      public $timed;            // comment time


      extends from user class

      public $uid;    
      public $username; 
      public $email;    
      public $fname;    
      public $lname;    
      public $gender;   
      public $dob;    
      public $status;   
      public $level;    

    birthday class interfaces

      public function __construct($ids); // birthday class constructor  
      public function get_user($id);     // user class function to get the user details related with current book 
   
	*/

	function birthday_wish($bdobj)
	{
		# code...
?>

<div class="comment mdl-color-text--grey-700">
  <header class="comment__header">
    <img src="images/co1.jpg" class="comment__avatar">
      <div class="comment__author">
        <strong><?php echo "By - ".$bdobj->fname." ".$bdobj->lname; ?></strong>
        <span><?php ?></span>
      </div>
  </header>
  <div class="comment__text">
  <?php
    echo $bdobj->comment;
  ?>
  </div>
  <nav class="comment__actions">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
      <i class="material-icons" role="presentation">thumb_up</i>
      <span class="visuallyhidden">like comment</span>
    </button>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
      <i class="material-icons" role="presentation">thumb_down</i>
      <span class="visuallyhidden">dislike comment</span>
    </button>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
      <i class="material-icons" role="presentation">share</i>
      <span class="visuallyhidden">share comment</span>
    </button>
  </nav>
</div>
<hr/>
<?php
	}
?>