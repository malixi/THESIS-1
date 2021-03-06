<?php
	SESSION_start();
	require_once('connector.php');

		$marketEmail=$_POST['newemail'];
		$marketFirstName=$_POST['firstName'];
		$marketLastName=$_POST['lastName'];
		$marketPassword=$_POST['newpassword'];
		$userType=$_POST['userType'];
		$marketBirthDate=$_POST['birthDate'];
    $marketContactNum=$_POST['contactNum'];
    $marketStats=$_POST['Status'];



	if(!filter_var($marketEmail, FILTER_VALIDATE_EMAIL)) {
      	echo "<script>alert('Email is Invalid.');history.back();</script>";
   		exit;
    }

    if (!preg_match("/^[a-zA-Z ]*$/",$marketFirstName)) {
      	echo "<script>alert('Only letters and white space allowed.');history.back();</script>";
   		exit;
    }

    if (!preg_match("/^[a-zA-Z ]*$/",$marketLastName)) {
      	echo "<script>alert('Only letters and white space allowed.');history.back();</script>";
   		exit;
    }

	$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ?');
	$stmt->bind_param('s', $marketEmail);
	$stmt->execute();
	$result = $stmt->get_result();
	if($rows = $result->fetch_assoc()) {
		header("Content-Type: text/html; charset=UTF-8");
		echo "<script>alert('Email already exists.');history.back();</script>";
		$stmt->close();
		exit;
	} else {
		if ($userType == "student") {
			$stmt2 = $dbconn->prepare('INSERT INTO users (email, password, firstName, lastName, userType, birthDate, contactNum, userStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$stmt2->bind_param('sssssssd', $marketEmail, $marketPassword, $marketFirstName, $marketLastName, $userType, $marketBirthDate, $marketContactNum, $marketStats);
			$stmt2->execute();

				header('Location: registerWelcome.php');
		}
		else if ($userType == "employee") {
			$query =  "INSERT INTO users (email, firstName, lastName, password, userType, birthDate, contactNum)values ('" . $marketEmail . "','" . $marketFirstName . "','" . $marketLastName . "','" . $marketPassword . "','" . $userType .  "','" . $marketBirthDate . "','" . $marketContactNum . "')";

			if(@mysqli_query($dbconn, $query)){
				header('Location: registerWelcome.php');
			}else{
				echo mysqli_error($dbconn);
			}
		}
	}


?>
