<?php

if(!isset($_GET['essid']) && !isset($_GET['macid']))
{
	die("Bad Request");
}

include('config.php');

$date = date("Y-m-d");
$hour = date("H");
$macid = $_GET['macid'];
$essid = $_GET['essid'];

$query = "select * from time where macid = '$macid' and date = '$date'";

$result = mysqli_fetch_array(mysqli_query($conn, $query));

if(count($result['date'])==1)
{
	if($hour > $result['phour'])
	{
		if($result['ticks']>=3)
		{
			$h = $result['hours'] + 1;
		}
		else
		{
			$h = $result['hours'];
		}

		$query = "update time set ticks = 1, phour = $hour, hours = $h where macid = '$macid' and date = '$date'";
		mysqli_query($conn, $query);
		die();
	}

	else if($hour == $result['phour'])
	{
		$ticks = $result['ticks'] + 1;
		$query = "update time set ticks = $ticks where macid = '$macid' and date = '$date'";
		mysqli_query($conn, $query);
		die();
	}
}

if(count($result['date'])==0)
{
	$query = "select * from time where macid = '$macid' and ticks != 0";
	$res = mysqli_fetch_array(mysqli_query($conn, $query));
	if($res['ticks']>=3)
	{
		$h = $res['hours'] + 1;
	}
	else
	{
		$h = $res['hours'];
	}

	$query = "update time set ticks = 0, hours = $h where macid = '$macid' and ticks != 0";
	mysqli_query($conn, $query);

	$query = "insert into time values('$macid', '$date', 1, 0, $hour)";
	mysqli_query($conn, $query);
	die();
}


?>
