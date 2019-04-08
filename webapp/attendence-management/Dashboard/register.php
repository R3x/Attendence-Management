<html>
<head>
	<title>Attendence Registration</title>
</head>
</html>

<?php

include('config.php');

if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['macid']))
{
	die("Bad Request");
}

$user = $_POST['username'];

$pass = $_POST['password'];

$macid = $_POST['macid'];

if(!preg_match("/^[a-zA-Z0-9]*$/", $user))
{
	die("Invalid characters detected: Only alphanumeric allowed");
}

if(!preg_match("/^[a-zA-Z0-9]*$/", $pass))
{
	die("Invalid characters detected: Only alphanumeric allowed");
}

if(!preg_match("/^[a-z0-9:]*$/", $macid))
{
	die("Invalid characters detected");
}

$query = "insert into users values('$user', md5('" . $user . $pass . $user . "'), '$macid')";

$result = mysqli_query($conn,$query);

if($result)
{
	echo "User created. Redirecting to login Page in 3 seconds.";
	header( "refresh:3;url=index.php" );

}
else
{
        echo "Username/macid already exists. Redirecting to login pagein 3 seconds.";
	header( "refresh:3;url=index.php" );
}

?>
