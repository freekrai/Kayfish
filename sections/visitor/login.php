<?php
	if( isset($_POST['username']) && isset($_POST['pass']) ){
		login($_POST['username'],$_POST['pass']);
	}
?>
<h2>Sign In</h2>
<form method="post">
  <p><label for="username">Username:</label>
  <input type="text" id="username" name="username" class="text" /></p>
  <p><label for="pass">Password</label>
  <input type="password" id="pass" name="pass" class="text" /></p>
  <p><button type="submit">Sign In</button></p>
</form>