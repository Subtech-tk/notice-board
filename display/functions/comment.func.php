<?php
	//comment.func.php
	/*
		this function output the one the comment section

		prototype
		function comment($cobj)

    $cobj=  object of comment class

    comment class members 

      public $cid;        // birthday comment id
      public $userid;       // user who commented
      public $nid;        // notice on which its commented
      public $comment;      // comment text
      public $dated;        // commnet dated
      public $timed;        // commnet timed

      extends from user class

      public $uid;      // user id
      public $usn;      // user usn
      public $fname;    // user first name
      public $lname;    // user last name
      public $gender;   // user gender
      public $dob;      // user data-of-birth
      public $pos;      // user position
      public $level;    // user level

    comment class interfaces

      public function __construct($ids); // comment class constructor  
      public function get_user($id);     // user class function to get the user details related with current comment
   
	*/

	function comment($cobj)
	{
		# code...
?>

<div class="comment mdl-color-text--grey-700">
  <header class="comment__header">
    <img src="images/avatar.png" class="comment__avatar">
      <div class="comment__author">
        <strong><?php echo "By - ".$cobj->fname." ".$cobj->lname;  ?></strong>
        <span><?php echo $cobj->dated;?></span>
      </div>
  </header>
  <div class="comment__text">
  <?php
    echo $cobj->comment;
  ?>
  </div>
  <!--<nav class="comment__actions">
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
  </nav>-->
</div>
<hr/>
<?php
	}
?>