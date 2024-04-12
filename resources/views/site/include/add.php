	<?php
	$email = $_POST["email"];
	$fname = $_POST["fname"];
	$sname = $_POST["sname"];
	$gender = $_POST["gender"];
	$streetAddress = $_POST["streetAddress"];
	$email = $_POST["email"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$phone = $_POST["phone"];
	$birthdate = $_POST["birthdate"];
	$age = $_POST["age"];
	$workHour = $_POST["workHour"];
	$starttime = $_POST["starttime"];
	$endtime = $_POST["endtime"];
	$zip = $_POST["zip"];
	$startdate = $_POST["startdate"];
	$smoke = $_POST["smoke"];
	$licence = $_POST["licence"];
	$transport = $_POST["transport"];

	if(empty($_POST["fname"])){
		die("First Name field is required!");
	}
	
	if(empty($_POST["sname"])){
		die("Second Name field is required!");
	}
	if(empty($_POST["gender"])){
		die("Gender field is required!");
	}
	if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
		die("Enter a valid email address");
	}

	if(empty($_POST["streetAddress"])){
		die("Street Address field is required!");
	}

	if(empty($_POST["city"])){
		die("City field is required!");
	}
	
	if(empty($_POST["state"])){
		die("State field is required!");
	}
	if(empty($_POST["zip"])){
		die("Zip field is required!");
	}
	if(empty($_POST["phone"])){
		die("Phone field is required!");
	}
	if(empty($_POST["birthdate"])){
		die("Birth date field is required!");
	}
	if(empty($_POST["workHour"])){
		die("Working hours field is required!");
	}
	$years = $_POST["years"];
	if(empty($_POST["years"])){
		die("Select your age status");
	}
	if(empty($_POST["age"])){
		die("Enter Your Age");
	}
	$days = $_POST['days'];
	if(empty($_POST['days'])){
		die("Select your available days");
	}
	if(empty($_POST["starttime"])){
		die("Enter work starting time");
	}
	if(empty($_POST["endtime"])){
		die("Enter work ending time");
	}
	if(empty($_POST["startdate"])){
		die("Enter work Starting date");
	}
	if(empty($_POST["smoke"])){
		die("Enter Smoking Status");
	}
	if(empty($_POST["licence"])){
		die("Select Licence status");
	}
	
	$licenceNumber = $_POST["licenceNumber"];

	$issueddate = $_POST["issueddate"];
	
	$expiredate = $_POST["expiredate"];
	$issuedcity = $_POST["issuedcity"];
	if(empty($_POST["transport"])){
		die("Enter your transport ownership status");
	}
	$daysString =serialize($_POST['days']);
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$appid = substr(str_shuffle($set), 0, 15);

	$mysqli = require __DIR__ ."/database.php";
	
	$sql = "INSERT INTO applicant_tb (appid,fname,sname,gender,streetAddress,city,state,zip,email,phone,birthdate,years,age,workHour,days,starttime,endtime,startdate,smoke,licence,licenceNumber,issueddate,expiredate,issuedcity,transport) VALUES('$appid',?,?,?,?,?,?,?,?,?,?,?,?,?,'".$daysString."',?,?,?,?,?,?,?,?,?,?)";
	$stmt = $mysqli->stmt_init();
	
	if(!$stmt -> prepare($sql)){
		die("<br>SQL Error:: ".$mysqli->error);
	}
	$stmt->bind_param("sssssssssssssssssssssssss",
					 $_POST["appid"],
					 $_POST["fname"],
					 $_POST["sname"],
					 $_POST["gender"],
					  $_POST["streetAddress"],
					  $_POST["city"],
					  $_POST["state"],
					  $_POST["zip"],
					  $_POST["email"],
					  $_POST["phone"],
					  $_POST["birthdate"],
					  $_POST["years"],
					  $_POST["age"],
					  $_POST["workHour"],
					  $_POST["days"],
					  $_POST["starttime"],
					  $_POST["endtime"],
					  $_POST["startdate"],
					  $_POST["smoke"],
					  $_POST["licence"],
					  $_POST["licenceNumber"],
					  $_POST["issueddate"],
					  $_POST["expiredate"],
					  $_POST["issuedcity"],
					  $_POST["transport"]
					 );
	if($stmt->execute()){
		//returns true if it is successifull
	header("Location: index.php");
	}
		else
			{
			die($mysqli->error." ".$mysqli->errno);
			}
	?>