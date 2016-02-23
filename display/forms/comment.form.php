<?php
	// comment.form.php
?>

<form action="<?php if(islogin())/* only work if user is login*/ {echo "$current_file?ref=$ids";} ?>" method="POST" enctype="" target="">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea rows=1 class="mdl-textfield__input" id="comment" name="comment"></textarea>
    <label for="comment" class="mdl-textfield__label"><?php if(!islogin()) {echo "Login / Register to join the discussion ";} else {echo "Join the discussion";}?></label>
    </div>
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
    <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
    </button>
</form>
