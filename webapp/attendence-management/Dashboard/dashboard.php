<?php

session_start();

if($_SESSION['username']==NULL && $_SESSION['macid']==NULL)
{
	die("You are not logged in.");
}

?>
<html>
<head>
	<title>Attendence Dashboard</title>
	<link rel="stylesheet" href="main.css">
</head>

<body>
<br>

<h1><center>Attendence Dashboard</center></h1>

<h3 style="text-align:right; padding-right:2%">User: <?php echo $_SESSION['username']; ?></h3>
<h3 style="text-align:right; padding-right:2%">Macid: <?php echo $_SESSION['macid']; ?></h3>
<h4 style="text-align:right; padding-right:2%"><a href="logout.php">Logout</a></h4>

<br><br>

<?php

include('config.php');

$query = "select * from time, users where time.macid = users.macid";
$result = mysqli_fetch_array();

?>

</body>
</html>
