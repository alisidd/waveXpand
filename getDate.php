<?php


	//echo "Inside getDate!!!!!!!";



	$user = 'DBMaster';
	$pass = '12341234';
	$db = 'wavexpandDB';

	$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

	$courses = $_GET{"courses"};

	$query = "select date from availablecourses where name = '{$courses}'";
	$data = mysqli_query($db,$query);

	$dates = array();
	while ($row = mysqli_fetch_array($data))
	{
		array_push($dates, $row["date"]);
	}

	echo json_encode($dates);

	$db->close();

?>
