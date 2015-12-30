<?php
	#get credentials for login
	$credentials = parse_ini_file("/etc/config.ini");

	# connect to database
	$link = mysqli_connect("laundry-instance.cpwhrdeyrmuq.us-west-2.rds.amazonaws.com", $credentials['username'], $credentials['password'], $credentials['dbname']);
	$user = $_POST['user'];
	$machine = $_POST['machine'];
	$current = $_POST['current'];

	#$user = $_SESSION['user'];
	if ($link === false) {
		print(json_encode(false));
		die();
	}

	$query = "UPDATE `wait_times` SET `" . $machine . "`='0';"; 
	$result = mysqli_query($link, $query);

	$query = "UPDATE `machine_queue` SET `current`=1 WHERE `user`='".$user."';";
	$result = mysqli_query($link, $query);
	print(mysqli_error($link));
?>