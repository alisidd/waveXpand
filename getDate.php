<?php
//** This file retrieves the date,level, part, duration, and trainer of the selcted course and advertises it to script.js

	session_start();
	$_SESSION['$course'] = $_GET{"courses"};


	$user = 'DBMaster';
	$pass = '12341234';
	$db = 'wavexpandDB';

	$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

	$courses = $_GET{"courses"};

	$query = "select date,level,part,duration,trainer from availablecourses where name = '{$courses}'";
	$data = mysqli_query($db,$query);

	$dates = array();
	$level = array();
	$part = array();
	$duration = array();
	$trainer = array();
	while ($row = mysqli_fetch_array($data))
	{
		array_push($dates, $row["date"]);
		array_push($level, $row["level"]);
		array_push($part, $row["part"]);
		array_push($duration, $row["duration"]);
		array_push($trainer, $row["trainer"]);
	}
	$_SESSION['$date'] = $dates[0];
	$_SESSION['$level'] = $level[0];
	$_SESSION['$part'] = $part[0];
	$_SESSION['$duration'] = $duration[0];
	$_SESSION['$trainer'] = $trainer[0];

	$dataArray = array($dates[0],$level[0],$part[0],$duration[0],$trainer[0]);
	echo json_encode($dataArray);

	//echo json_encode($dates);

	$db->close();

?>