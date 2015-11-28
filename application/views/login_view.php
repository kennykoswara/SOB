<!DOCTYPE html>
<html>
	<head>
		<title>HelpMe - Sign In or Register</title>
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/login/css/my_styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="container-fluid">
			<?php
			$attributes = array('class' => 'form-inline col-xs-offset-7','style'=>'margin-top: 1.5em');
			echo form_open('login_control',$attributes); ?>
				<div class="row">
					<div class="form-group">
						<input type="email" class="form-control input-md" id="useremail" name="useremail" placeholder="Email" required="true">
					</div>
					<div class="form-group">
						<input type="password" class="form-control input-md" id="password" name="password" placeholder="Password" required="true">
					</div>
					<button type="submit" name="submitForm" value="signin" id="signin" class="btn btn-default"><b>Sign In</b></button>
					<?php echo form_error('password', '<div class="error">', '</div>'); ?>
				</div>
			</form>
		</div>
    <br/>
    <hr/>

		<div class="container-fluid" style="margin-top: 7em">
			<div class="col-md-offset-2 col-md-4">
				<div class="row">
					<h1>Help Other People.</h1>
				</div>
				<div class="row">
					<h3>Sharing is Caring</h3>
				</div>
			</div>
			<div class="col-md-offset-1 col-md-4">
				<div class="row">
					<h4><b>Want to help others?</b> Join us today!</h4>
				</div>
					<?php
					$attributes2 = array('class' => 'form');
					echo form_open('login_control/submit',$attributes2); ?>
					<div class="row">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="fullName" name="fullName" placeholder="Full Name" required="true">
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="email" class="form-control input-lg" id="eMail" name="eMail" placeholder="Email" required="true">
							<?php echo form_error('eMail', '<div class="error">', '</div>'); ?>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="address" name="address" placeholder="Address" required="true">
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="password" class="form-control input-lg" id="passWord" name="passWord" placeholder="Password" required="true">
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="password" class="form-control input-lg" id="passWordR" name="passWordR" placeholder="Retype Password" onChange="isPasswordMatch();" required="true">
						</div>
					</div>
					<div id="divCheckPassword"></div>
					<button type="submit" name="submitForm" value="signup" id="signup" class="btn btn-default btn-lg btn-info" style="margin-left:79%"><b>Sign Up</b></button>
				</form>
			</div>
		</div>

	<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/login/js/my_js.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script>
		function isPasswordMatch() {
			var password = $("#passWord").val();
			var confirmPassword = $("#passWordR").val();

			if (password != confirmPassword)
			{
				$("#divCheckPassword").html("Passwords do not match!");
				$("#signup").prop("disabled", true);
			}
			else
			{
				$("#divCheckPassword").html("Passwords match.");
				$("#signup").prop("disabled", false);
			}
		}

		$(document).ready(function () {
			$("#passWordR").keyup(isPasswordMatch);
		});
	</script>
</body>
</html>
