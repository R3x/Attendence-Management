<html>

<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['macid']!=NULL)
{
	header("location:./dashboard.php");
}

?>
<head>
        <title>Attendence Login</title>
	<link rel="stylesheet" href="main.css">
</head>

<body>
<br>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Register</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<form method="post" action="login.php">	
				<br><br>
				<div class="group">
					<label for="username" class="label">Username</label>
					<input name="username" required type="text" class="input">
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input name="password" required type="password" class="input" data-type="password">
				</div>
				<br><br>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
			</form>
			</div>
			<div class="sign-up-htm">
			<form method="post" action="register.php">
				<br><br>
				<div class="group">
					<label for="username" class="label">Username</label>
					<input name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input name="password" required type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="macid" class="label">Mac ID</label>
					<input name="macid" required class="input" type="text">
				</div>
				<br>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

</body>
