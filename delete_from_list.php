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
	$query = "DELETE FROM `machine_queue` WHERE `user`='" . $user . "' AND `machine_name`='" . $machine . "';";
	#$result = mysqli_query($link, $query);
	$query_check_for_next = "SELECT `user` FROM `machine_queue` WHERE `machine_name`='" . $machine . "' ORDER BY `time` ASC;";
	$result = mysqli_query($link, $query_check_for_next);
	if ($current==1) {
		$next_user = mysqli_fetch_row($result);
		$next_user = mysqli_fetch_row($result);
		print(json_encode($next_user));
		die();
		if ($next_user = mysqli_fetch_array($result)) {
			$next_user = $next_user[0];
			$query = "UPDATE `wait_times` SET `" . $machine . "`='" . date('Y-m-d H:i:s') . "';";
			$get_user_email = "SELECT `email` FROM `users` WHERE `user` = '" . $next_user . "';";
			$result = mysqli_query($link, $get_user_email);
			$to = mysqli_fetch_array($result)[0];
			$message = "Hi " . $next_user . ", \n \t Your machine is free. It will be reserved "
				."for you for 15 minutes, after which you will be placed at the end of the queue."
				."\n Best,\nBowles Laundry"; 
			$result = gmail($to, $subject, $message);
			#print(json_encode("i go here"));
			die();
		}
		else {
			$query = "UPDATE `wait_times` SET `" . $machine . "`='0';"; 
		}
		$result = mysqli_query($link, $query);
	}
	
	#print(json_encode(true));

	function gmail($to, $subject, $message){
	    //path to PHPMailer class
	    require_once('./phpmailer/class.phpmailer.php');
	    // optional, gets called from within class.phpmailer.php if not already loaded
	    include("./phpmailer/class.smtp.php"); 

	    $mail = new PHPMailer();
	    $mail->CharSet = "UTF-8";
	    // telling the class to use SMTP
	    $mail->IsSMTP();
	    // enables SMTP debug information (for testing)
	    // 1 = errors and messages
	    // 2 = messages only
	    $mail->SMTPDebug  = 0;
	    // enable SMTP authentication
	    $mail->SMTPAuth   = true;
	    // sets the prefix to the servier
	    $mail->SMTPSecure = "ssl";
	    // sets GMAIL as the SMTP server
	    $mail->Host       = "smtp.gmail.com";
	    // set the SMTP port for the GMAIL server
	    $mail->Port       = 465;
	    // GMAIL username
	    $mail->Username   = "bowels.laundry@gmail.com";
	    // GMAIL password
	    $mail->Password   = "keepbowlesclean";
	    //Set reply-to email this is your own email, not the gmail account 
	    //used for sending emails
	    $mail->SetFrom('bowles.laundry@gmail.com');
	    $mail->FromName = "Bowles Laundry";
	    // Mail Subject
	    $mail->Subject    = "[Bowles Laundry] Your machine is ready";

	    //Main message
	    $mail->MsgHTML($message);

	    //Your email, here you will receive the messages from this form. 
	    //This must be different from the one you use to send emails, 
	    //so we will just pass email from functions arguments
	    $mail->AddAddress($to, "");
	    if(!$mail->Send()) 
	    {
	        //couldn't send
	        return false;
	    } 
	    else 
	    {
	        //successfully sent
	        return true;
	    }
	}
?>