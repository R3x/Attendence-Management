<html>
<head>
	<title>Logout</title>
</head>
</html>

<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['macid']!=NULL)
{
	session_destroy();
	echo "You are successfully logged out.";
}

else
{
	echo "You are not logged in.";
}

?>
