<?php 
session_start();
if(isset($_SESSION["admin_email"])){
	header("location:index.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://gemmerubys.com/css/admin.css">
</head>
<body>
	<section class="login_register">
		
		<form name="admin_login" method="POST" action="index.php">
		<div class="login_register_content">
			<p id="register_successful"></p>
			<div class="login_register_content_form">
				<div class="login_register_content_email"> 
					<label for="admin_login_email">Email Address*</label>
					<input type="email" name="admin_login_email" id="admin_login_email" required>
				</div>
				<div class="login_register_content_password">
					<label for="admin_login_pwd">Password*</label>
					<input type="password" name="admin_login_pwd" id="admin_login_pwd" required>
			    </div>
		    </div>
		    <div class="login_register_content_btn">
				<button type="submit" name="login_submit">Login</button>
		    </div>
		    <br>
		</div>
		</form>
	</section>
</body>
</html>
