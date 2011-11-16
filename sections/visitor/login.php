<?php
	if( isset($_POST['username']) && isset($_POST['pass']) ){
		login($_POST['username'],$_POST['pass']);
	}
?>
<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Sign In</h1>
		</div>
		<div class="row">
			<div class="span16">
				<form method="post">
				<fieldset>
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="username">Username</label>
						<div class="input">
							<input class="xlarge required" id="username" name="username" size="45" type="text">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="pass">Password</label>
						<div class="input">
							<input class="xlarge required" id="pass" name="pass" size="45" type="password">
						</div>
					</div><!-- /clearfix -->
					<div class="actions">
						<input type="submit" class="btn primary" value="Sign In">&nbsp;
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
