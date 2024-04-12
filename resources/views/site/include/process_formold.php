<?php
if(empty($_POST['fname'])){
	die("First name is required");
}

if(empty($_POST['sname'])){
	die("Second name is required");
}
if(empty($_POST['gender'])){
	die("Select Your Gender");
}
if(empty($_POST['streetAddress'])){
	die("Street Address is required");
}

if(empty($_POST['city'])){
	die("City is rrequired");
}

if(empty($_POST['state'])){
	die("State is required");
}

if(empty($_POST['zip'])){
	die("Zip Code is required");
}

if(! filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
	die("Valid email is required");
}

if(empty($_POST['phone'])){
	die("Number Field is Required");
}
if(!preg_match("/[0-9]/i",$_POST['phone'])){
		die("Please Enter a valid Number");
	}
if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 13){
		die("Please a valid phone number length");
	}
if(empty($_POST['years'])){
	die("Select your age range");
}

if(empty($_POST['age'])){
	die("Your Age is Required");
}

if(empty($_POST['birthdate'])){
	die("Your Birth date is required");
}

if(empty($_POST['socialsecurity'])){
	die("Select either Social Security Number or EIN number");
}

if(empty($_POST['days'])){
	die("Select YourAvailable days");
}
if($_POST['days'] < 2){
	die("You must be available for atleast 2 days per weak");
}
if(empty($_POST['starttime'])){
	die("Starting time is required");
}

if(empty($_POST['endtime'])){
	die("Ending time is required");
}

if(empty($_POST['startdate'])){
	die("Start date is required");
}

if(empty($_POST['workperiod'])){
	die("Work Period is required");
}

if(empty($_POST['workHour'])){
	die("Working Hours is required");
}

if(empty($_POST['smoke'])){
	die("Enter Smoking Status");
}

if(empty($_POST['licence'])){
	die("Select Licence ownership");
}

if(empty($_POST['transport'])){
	die("Transport ownership is required");
}
/*$days = $_POST['days'];
if(isset($_POST['submit'])){
	for($i=0;$i<sizeof($days);$i++){
		$query = "INSERT INTO applicant_tb (days) VALUES ('".$days[$i]."')";
		mysqli_query($query) or die(mysql_error());
	}
		
}*/
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$appid = substr(str_shuffle($set), 0, 15);

$mysqli = require __DIR__ ."/database.php";
 
$sql = "INSERT  INTO applicant_tb (appid,fname,sname,gender,streetAddress,city,state,zip,email,phone,years,age,birthdate,socialsecurity, socialsecurityNumber,einNumber,starttime, endtime, startdate, workperiod, workHour, smoke, licence, licenceNumber,issueddate, expiredate, issuedcity, transport) VALUES('$appid',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if(! $stmt -> prepare($sql)){
	die("<br>SQL error:: :: ". $mysqli->error);
}

$stmt->bind_param("sssssssssssssssssssssssssssss",
				  $appid,
				  $_POST['fname'],
				  $_POST['sname'],
				  $_POST['gender'],
				  $_POST['streetAddress'],
				  $_POST['city'],
				  $_POST['state'],
				  $_POST['zip'],
				  $_POST['email'],
				  $_POST['phone'],
				  $_POST['years'],
				  $_POST['age'],
				  $_POST['birthdate'],
				  $_POST['socialsecurity'],
				  $_POST['socialsecurityNumber'],
				  $_POST['einNumber'],
				  $_POST['days'],
				  $_POST['starttime'],
				  $_POST['endtime'],
				  $_POST['startdate'],
				  $_POST['workperiod'],
				  $_POST['workHour'],
				  $_POST['smoke'],
				  $_POST['licence'],
				  $_POST['licenceNumber'],
				  $_POST['issueddate'], 
				  $_POST['expiredate'],
				  $_POST['issuedcity'],
				  $_POST['transport']
				   );
if($stmt->execute()){
		//returns true if it is successifu
	header("Location: index.php");
	}
		else
			{
			die($mysqli->error." ".$mysqli->errno);
			}

print_r($_POST);

?>

<?php /*?><?php
	require __DIR__ ."/database.php";

	if(isset($_REQUEST['submit'])){
	if(isset($_POST['submit'])){
			
		$fname = $_POST["fname"];
		$sname = $_POST["sname"];
		$gender = $_POST["gender"];
		$streetAddress = $_POST["streetAddress"];
		$email = $_POST["email"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$phone = $_POST["phone"];
		$birthdate = $_POST["birthdate"];
		$years = $_POST["years"];
		$age = $_POST["age"];
		$workHour = $_POST["workHour"];
		$starttime = $_POST["starttime"];
		$endtime = $_POST["endtime"];
		$zip = $_POST["zip"];
		$startdate = $_POST["startdate"];
		$smoke = $_POST["smoke"];
		$licence = $_POST["licence"];
		$transport = $_POST["transport"];
	 	$licenceNumber = $_POST["licenceNumber"];
		$issueddate = $_POST["issueddate"];
		$expiredate = $_POST["expiredate"];
		$issuedcity = $_POST["issuedcity"];
		
		$days = $_POST['days'];
		
		$chk="";
		 
		foreach($days as $checkdays){
			$chk .= $checkdays.", ";
		}
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$appid = substr(str_shuffle($set), 0, 15);
		
		
		$sql="INSERT INTO applicant_tb (appid,fname,sname,gender,streetAddress,city,state,zip,email, phone,birthdate,years,age, workHour,days,starttime,endtime,startdate,smoke,licence,licenceNumber,issueddate,expiredate,issuedcity,transport) VALUES('$appid','$fname','$sname','$gender','$streetAddress','$state','$city','$zip','$email','$phone','$birthdate','$years','$age','$workHour','".$days."','$starttime','$endtime','$startdate','$smoke','$licence','$licenceNumber','$issueddate','$expiredate','$issuedcity','$transport') ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	  }
	}

	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>
<?php */?>
			<!--sending email notification-->
	<?php /*?>	<?php
			if(isset($_POST['email']) && $_POST['email'] != ''){
				if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
			  $name = $_POST['name'];
			  $visitor_email = $_POST['email'];
			  $message = $_POST['message'];

				$email_from = 'admin@familypoolserviceonline.com';

				$email_subject = "New Message From a Volunteer";
				 $email_id = 'Volunteer GoodNews aadmin@familypoolserviceonline.com';
				
				$email_body = "Dear Admin We have received new job Application From: '$fname  $sname'.\n\n". "Application ID:  $appid.\n". "Email address: $visitor_email\n\n\nFor more information visit Administrator panel". " https://healingvoiceministry.com/systemadmin/admin/index.php"."\n\nFrom: admin@familypoolserviceonline.com". "\n\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. joshuajayrous@gmai.com";

				
			  $to = "admin@familypoolserviceonline.com";

			  $headers = "From: $email_id \r\n";

			  $headers .= "Reply-To: $visitor_email \r\n";
			//sending email
			 mail($to,$email_subject,$email_body,$headers);
				}
					}
		 ?>  



<?php
			if(isset($_POST['email']) && $_POST['email'] != ''){
				if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
				  $name = $_POST['fname'];
				  $visitor_email = $_POST['email'];
				  $message = $_POST['message'];
				  $email_from = 'admin@familypoolserviceonline.com';
				 $email_id = 'Familypool Service admin@familypoolserviceonline.com';
				$email_subject = "Volunteer Confirmation";

				$email_body = "Hello Dear $name \n\nYour Application to Family Pool Service Job Offer has been successiful received. \n\nOur Hirering center is processing your details and we will get back to you within a short time via this email address or phone number.\n\n"."Thank you for your love with Family Pool Serivice\n\n\n". "From: admin@familypoolserviceonline.com". "\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. joshuajayrous@gmai.com";

			  $to = "$visitor_email";

			  $headers = "From: $email_id \r\n";

			  $headers = "Reply-To: $email_from \r\n";
			//sending email
			 mail($to,$email_subject,$email_body,$headers);
				}
					}
		 ?>

<?php 
 		$fname=  $_POST['fname'];
				 $sname = $_POST['sname'];
				 $gender= $_POST['gender'];
				 $streetAddress = $_POST['streetAddress'];
				 $city = $_POST['city'];
				 $state = $_POST['state'];
				 $zip = $_POST['zip'];
				 $email =  $_POST['email'];
				$phone =  $_POST['phone'];
				  $years = $_POST['years'];
				 $age =  $_POST['age'];
				 $birthdate = $_POST['birthdate'];
				 $socialsecurity = $_POST['socialsecurity'];
				 $socialsecurityNumber = $_POST['socialsecurityNumber'];
				 $einNumber = $_POST['einNumber'];
				 $days = $_POST['days'];
				 $starttime = $_POST['starttime'];
				 $endtime = $_POST['endtime'];
				  $startdate = $_POST['startdate'];
				 $workperiod = $_POST['workperiod'];
				 $workHour = $_POST['workHour'];
				 $smoke = $_POST['smoke'];
				 $licence = $_POST['licence'];
				 $licenceNumber = $_POST['licenceNumber'];
				 $issueddate = $_POST['issueddate'];
				 $expiredate = $_POST['expiredate'];
				 $issuedcity = $_POST['issuedcity'];
				 $transport = $_POST['transport'];
				 
				 $sql = "INSERT  INTO applicant_tb (appid,fname,sname,gender,streetAddress,city,state,zip,email,phone,years,age,birthdate,socialsecurity, socialsecurityNumber,einNumber,starttime, endtime, startdate, workperiod, workHour, smoke, licence, licenceNumber,issueddate, expiredate, issuedcity, transport) VALUES('$appid','$fname','$sname','$gender','$streetAddress','$city','$state','$zip','$email','$phone', '$years', '$age','$birthdate', '$socialsecurity', '$socialsecurityNumber', '$einNumber', '".$days."','$starttime','$endtime','$startdate', '$workperiod', '$workHour', '$smoke', '$licence', '$licenceNumber', '$issueddate', '$expiredate', '$issuedcity', '$transport',)";
*/?>


