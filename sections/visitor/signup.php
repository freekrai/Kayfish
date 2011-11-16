<?php
	if( isset($_POST['username']) ){
		if( $_POST['pass1'] == $_POST['pass2'] ){
			$usern = $_POST['username'];
			$pass = $_POST['pass1'];
			$email = $_POST['email'];
			$name = $_POST['name'];
			
			//	check for existing user
			$ex_user = get_single_item(array('table' => 'users','class' => 'user','where' => '`user_login` = "'.$usern.'" OR `user_email` = "'.$email.'"'));
			if( $ex_user->ID ){
				$error = "There is a user with this email or username already.";
				display_messages();
			}else{
				$res = $kfdb->insert("users", array("user_login"=>$usern,"user_pass"=>passhash($pass),"user_nicename"=>$name,"user_email"=>$email,"user_status"=>1,"display_name"=>$name));
				if( $res ){
					$uid = $kfdb->lastid();
					$success = "You have sucessfully signed up. <a href='/login'>Click here to login</a>";
					display_messages();
				}else{
					$error = "There was an error signing up, please try again";
					display_messages();
				}
			}
		}else{
			$error = "There was an error signing up, please try again.<br />Your passwords did not match";
			display_messages();
		}
	}
	set_page_info('title', "Sign Up On Textoad" );
?>
<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Signup <small>Supporting text or tagline</small></h1>
		</div>
		<div class="row">
			<div class="span16">
				<form action="" method="post">
				<fieldset>
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="username">Pick a Username</label>
						<div class="input">
							<input class="xlarge required" id="username" name="username" size="45" type="text">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="email">What is your Email address</label>
						<div class="input">
							<input class="xlarge required" id="email" name="email" size="45" type="text">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="name">What is Your name</label>
						<div class="input">
							<input class="xlarge required" id="name" name="name" size="45" type="text">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="pass1">Password</label>
						<div class="input">
							<input class="xlarge required" id="pass1" name="pass1" size="45" type="password">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label style="text-align:left;width:30%;" for="pass2">Confirm Password</label>
						<div class="input">
							<input class="xlarge required" id="pass2" name="pass2" size="45" type="password">
						</div>
					</div><!-- /clearfix -->
					<div class="actions">
						<input type="submit" class="btn primary" value="Signup">&nbsp;
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
