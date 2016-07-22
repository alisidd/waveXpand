<?php
	$user = 'DBMaster';
	$pass = '12341234';
	$db = 'wavexpandDB';

	$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");



	$query = "select track from availabletracks";
	$data = mysqli_query($db,$query);


	$tracks = array();
	while ($row = mysqli_fetch_array($data))
	{
		array_push($tracks, $row["track"]);
	}

	echo json_encode($tracks);


	$db->close();

?>