<?php
//** This file displays the related courses to the selected track that is advertised from getTracks.php; in turn, this file advertises the selected course to getDate.php

	if(isset($_GET["tracks"]))
{
	$user = 'DBMaster';
	$pass = '12341234';
	$db = 'wavexpandDB';

	$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

	$tracks = $_GET{"tracks"};


	$query = "select name from availablecourses where track = '{$tracks}'";
	$data = mysqli_query($db,$query);


	$courses = array();
	while ($row = mysqli_fetch_array($data))
	{
		array_push($courses, $row["name"]);
	}

	echo json_encode($courses);


	$db->close();
}
?>