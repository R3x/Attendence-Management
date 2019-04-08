<html>
<head>
	<title>Attendence Login</title>
</head>
</html>
<?php

session_start();

$_SESSION['macid'] = NULL;
$_SESSION['username'] = NULL;

include('config.php');

if(!isset($_POST['username']) && !isset($_POST['password']))
{
	die("Bad Request");
}

$user = $_POST['username'];

$pass = $_POST['password'];

if(!preg_match("/^[a-zA-Z0-9]*$/", $user))
{
        die("Invalid characters detected: Only alphanumeric allowed");
}

if(!preg_match("/^[a-zA-Z0-9]*$/", $pass))
{
        die("Invalid characters detected: Only alphanumeric allowed");
}

$query = "select * from users where username = '$user' and password = md5('". $user. $pass. $user . "')";

$result = mysqli_query($conn,$query);

if($result)
{
        $row = mysqli_fetch_array($result);
        if(count($row['username'])==1)
        {
		$_SESSION['username'] = $row['username'];
		$_SESSION['macid'] = $row['macid'];
		header("location:./dashboard.php");
        }
        else
        {
		echo "Invalid Credentials. Redirecting to login page in 3 seconds.";
		header( "refresh:3;url=index.php" );
        }
}
else
{
	echo "Internal Error: Please ask an admin. Redirecting to login page in 3 seconds.";
	header( "refresh:3;url=index.php" );
}
?> 
