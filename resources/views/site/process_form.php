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
if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 17){
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
$days = $_POST["days"];

$daysChck ="";
foreach($days as $daysChckbox){
	$daysChck.= $daysChckbox.", ";
}
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$appid = substr(str_shuffle($set), 0, 15);

$mysqli = require __DIR__ ."/database.php";
 
$sql = "INSERT  INTO applicant_tb (appid,fname,sname,gender,streetAddress,city,state,zip,email,phone,years,age,birthdate,socialsecurity, socialsecurityNumber,einNumber,days,starttime, endtime, startdate, workperiod, workHour, smoke, licence, licenceNumber,issueddate, expiredate, issuedcity, transport) VALUES('$appid',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'$daysChck',?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if(! $stmt -> prepare($sql)){
	die("<br>SQL error:: :: ". $mysqli->error);
}

$stmt->bind_param("sssssssssssssssssssssssssss",
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
	header("Location: success.html");
	}
		else
			{
			if($mysqli->errno === 1062){
				header("Location: duplicate.html");
			exit;
			}
			else
			die($mysqli->error." ".$mysqli->errno);
			exit;
			}

print_r($_POST);

//SENDING EMAIL NOTIFICATION
	$email = $_POST["email"];
 	$name = $_POST['fname'];
	$name = strtoupper($name);
	//include PHPmailerAutoload.php
	require 'phpmailer/PHPMailerAutoload.php';

	//create an instance of PHPMailer
	$mail = new PHPMailer();

	//set host
	$mail->Host ="smtp.gmail.com";
	//enable SMTP
	//$mail->isSMTP();
	//set authentication to true
	$mail->SMTPAuth='true';
	//set login details for gmail account
	$mail->Username = "admin@familypoolserviceonline.com";
	$mail->Password = "Eliakimu1";
 	//set type of protection
	$mail->SMTPSecure = "ssl"; // "tls"
	//set prot
	$mail->Port = 465; // or 587 for tls
	//set subject
	$mail->Subject = "Family Pool Job Application";
	$mail->isHTML(true);
	//set body
	$mail->Body = "<body>
	<p  style='font-family: Roboto;'>Dear Admin We have received new job Application from <strong>$name</strong><br>Email Address <strong>$email</strong></p>
	
	<p style='font-family: Roboto;'>For more details about this application please visit the site <a href= 'https://familypoolserviceonline.com/systemadmin/admin/home.php' style='text-decoration: none;color: #0859A4;font-weight: 600'>Administrator Dashboard</a></p>
	
	<p style='font-weight: 600;font-family: Roboto;'><em>Family Pool Service, Together We build America</em></p>
	<hr>
	
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Chief Designer. joshuajayrous@gmai.com</p>
	
	</body>";
	//set who is sending an email
	$mail->setFrom($email,$name);
	//set where we aresending email(recipients)
	//$mail->addAddress('admin@familypoolserviceonline.com');
	$mail->addAddress('admin@familypoolserviceonline.com','Job Application Family Pool');
	$mail->addReplyTo($email);
	//send an email
	if($mail->send()){
		echo 'Mail Sent';
	}
	else{
		echo 'Mail Sending filed';
		exit;
	}


											//////////////////////////////////////////////
						////////////AUTO RESPONSE EMAIL/////////////////
						//E//M//A//I//L//R//E//S//P//O//N//D//E//R/////
						//////////////////////////////////////////////


if($mail->Send()) {
   $autoRespond = new PHPMailer();

   //$autoRespond->IsSMTP();
   $autoRespond->CharSet    = 'UTF-8';
   $autoRespond->SMTPDebug  = 0;
   $autoRespond->SMTPAuth   = TRUE;
   $autoRespond->SMTPSecure = "tls";
   $autoRespond->Port       = 587;
   $autoRespond->Username   = "admin@familypoolserviceonline.com";
   $autoRespond->Password   = "********";
   $autoRespond->isHTML(true);
   $autoRespond->Host = "smtp.gmail.com";
	
   $autoRespond->setFrom('admin@familypoolserviceonline.com', 'Family Pool Service');
   $autoRespond->addAddress($email,$name);
   $autoRespond->Subject = "Job Application Received"; 
	
   $autoRespond->Body = "<body>
	<p style='font-family: Roboto;'>Hello Dear <strong>$name </strong><br><strong style='text-decoration: none;color: #0859A4;font-weight: 600'>Your Application to Family Pool Service Job Offer has been successiful received</strong><br>Hirering board is processing your details and we will get back to you within a short time via this email address or phone number you provided in your application form.</p>
	
	<p style='font-family: Roboto;'>Thank you for your love with Family Pool Serivice</p>
	
	<p style='font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<p style='font-family: Roboto;font-weight: 600'>From: admin@familypoolserviceonline.com</p>
	
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Contact Chief System Designer<a href= 'mailto:joshuajayrous@gmai.com' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'> joshuajayrous@gmai.com </a></p>
	</body>";

   $autoRespond->Send(); 
	
}


						//////////////////////////////////////////////
						////////////AUTO RESPONSE EMAIL/////////////////
						//E//M//A//I//L//R//E//S//P//O//N//D//E//R/////
						//////////////////////////////////////////////


?>


<?php

/*
	$mail2 = new PHPMailer();

    // set mailer to use SMTP
    $mail2->IsSMTP();

    //$mail2->IsSMTP();

    $mail->Username = 'admin@familypoolserviceonline.com';                     // SMTP username
    $mail->Password = 'Eliakimu1';                               // SMTP password
    $mail2->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail2->Port = 465;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above



    $mail2->From = 'admin@familypoolserviceonline.com';

    // below we want to set the email address we will be sending our email to.
    $mail2->addAddress($email,$fname);

    
    // set email format to HTML
    $mail2->IsHTML(true);

    $mail2->Subject = "Thank you for Job Application";

    $mail2->Body = "<body>
	<p style='font-family: Roboto;'>Hello Dear <strong>$fname $sname</strong><br>Your Application to Family Pool Service Job Offer has been successiful received<br>Hirering board is processing your details and we will get back to you within a short time via this email address or phone number you provided in your application form.</p>
	
	<p style='font-family: Roboto;'>Thank you for your love with Family Pool Serivice</p>
	
	<p style='font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<p style='font-family: Roboto;font-weight: 600'>From: admin@familypoolserviceonline.com</p>
	
	<hr>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Contact Chief System Designer<a href= 'mailto:joshuajayrous@gmai.com' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'> joshuajayrous@gmai.com </a></p>
	</body>";

    if(!$mail2->send())
    {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail2->ErrorInfo;
        exit;
    }
*/
?>


<!--sending email notification-->
		<?php /*?>
		
<?php
	$email = $_POST["email"];
 	$fname = $_POST["fname"];
 	$sname = $_POST["sname"];
 	$appid = $_POST["appid"];
	$fname = strtoupper($fname);
	$sname = strtoupper($sname);
	//include PHPmailerAutoload.php
	require 'phpmailer/PHPMailerAutoload.php';

	//create an instance of PHPMailer
	$mail = new PHPMailer();

	//set host
	$mail->Host ="smtp.gmail.com";
	//enable SMTP
	//$mail->isSMTP();
	//set authentication to true
	$mail->SMTPAuth='true';
	//set login details for gmail account
	$mail->Username = "admin@familypoolserviceonline.com";
	$mail->Password = "temp () Password";
 	//set type of protection
	$mail->SMTPSecure = "ssl"; // "tls"
	//set prot
	$mail->Port = 465; // or 587 for tls
	//set subject
	$mail->Subject = "Family Pool Job Application";
	$mail->isHTML(true);
	//set body
	$mail->Body = "<body>
	<img src='images/logo.png' width='100px'>
	<p  style='font-family:helvetica;'>Hello Dear <strong>$fname $sname</strong><br>Your Application to Family Pool Service Job Offer has been successiful received<br>Hirering board is processing your details and we will get back to you within a short time via this email address or phone number you provided in your application form.</p>
	<p style='font-family: Roboto;'>Thank you for your love with Family Pool Serivice</p>
	<p style='font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<p style='font-family: Roboto;font-weight: 600'>From: admin@familypoolserviceonline.com</p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Chief Designer. joshuajayrous@gmai.com</p>
	
	</body>";
	//set who is sending an email
	$mail->setFrom('admin@familypoolserviceonline.com','Family Pool Service');
	//set where we are sending email(recipients)
	//$mail->addAddress('admin@familypoolserviceonline.com');
	$mail->addAddress($email,$fname);
	$mail->addReplyTo('admin@familypoolserviceonline.com');
	//send an email
	if($mail->send()){
		echo 'Mail Sent';
	}
	else{
		echo 'Mail Sending filed';
	}

?>

<?php
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
<?php */?>