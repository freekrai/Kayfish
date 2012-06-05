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
	set_page_info('title', "Sign Up" );
?>
<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Signup <small>Supporting text or tagline</small></h1>
		</div>
		<div class="row">
			<div class="span12">
<?php
				$form = new kfforms("","post","","form-horizontal");
				$form->section("");
				$form->field("Pick a Username","username","text","xlarge required","",array(),"");
				$form->field("What is your Email address","email","text","xlarge required","",array(),"");
				$form->field("What is Your name","name","text","xlarge required","",array(),"");
				$form->field("Password","pass1","password","xlarge required","",array(),"");
				$form->field("Confirm Password","pass2","password","xlarge required","",array(),"");
				$form->sectionbreak();
				$form->buttons("Signup");
				$form->end();
				$form->html();
?>
			</div>
		</div>
	</div>
</div>
