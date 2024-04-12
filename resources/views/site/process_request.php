<?php
//Processing the Service request
if(empty($_POST["name"])){
	die("Name Field is required");
}
if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
		die("Enter a valid email address");
	}
if(empty($_POST["state"])){
	die("Select the state the pool is located");
}

if(empty($_POST["city"])){
	die("Select the city where pool is located");
}

if(empty($_POST["street"])){
	die("Street Address is required");
}
if(empty($_POST["phone"])){
	die("Phone Number is required");
}
if(empty($_POST["service"])){
	die("Select tleast one service you require from us");
}
if(empty($_POST["description"])){
	die("Descibe the service you want in not less than 50 characters");
}
$service=$_POST["service"];
$serviceChck="";
foreach($service as $serviceChckBox){
	$serviceChck.= $serviceChckBox."<br>";
}
$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$serviceid = substr(str_shuffle($set), 0, 15);
	$mysqli = require __DIR__ ."/database.php";


	$sql = "INSERT INTO service_tb (serviceid,name,email,state,city,street,phone,service,description) VALUES('$serviceid',?,?,?,?,?,?,'$serviceChck',?)";
	$stmt = $mysqli->stmt_init();
	
	if(!$stmt -> prepare($sql)){
		die("<br>SQL Error:: ".$mysqli->error);
	}
	$stmt->bind_param("sssssss",
					 $_POST["name"],
					 $_POST["email"],
					 $_POST["state"],
					 $_POST["city"],
					 $_POST["street"],
					 $_POST["phone"],
					 $_POST["description"]
					 );
	if($stmt->execute()){
		//returns true if it is successiful
	header("Location: success.html");
	}
		else
			{
			die($mysqli->error." ".$mysqli->errno);
			exit;
			}
//SENDING EMAIL NOTIFICATION
	$email = $_POST["email"];
 	$name = $_POST["name"];
 	$serviceid = $_POST["serviceid"];
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
	$mail->Subject = "Service Request Family Pool";
	$mail->isHTML(true);
	//set body
	$mail->Body = "<body>
	<p  style='font-family: Roboto;'>New Service request has been Received<br>From <strong>$name </strong><br><br>Email Address <strong>$email</strong></p>
	
	<p style='font-family: Roboto;'>For more details about this Service Request please Visit <a href= 'https://familypoolserviceonline.com/systemadmin/admin/home.php' style='text-decoration: none;color: #0859A4;font-weight: 600'>Administrator Dashboard</a></p>
	
	<p style='font-weight: 600;font-family: Roboto;'><em>Family Pool Service, Together We build America</em></p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Contact Chief System Designer<a href= 'mailto:joshuajayrous@gmai.com' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'> joshuajayrous@gmai.com </a></p>
	
	</body>";
	//set who is sending an email
	$mail->setFrom($email,$name);
	//set where we aresending email(recipients)
	//$mail->addAddress('admin@familypoolserviceonline.com');
	$mail->addAddress('admin@familypoolserviceonline.com','Family Pool Service');
	$mail->addReplyTo($email);
	//send an email
	if($mail->send()){
		echo 'Mail Sent';
	}
	else{
		echo 'Mail Sending filed';
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
	
   $autoRespond->setFrom('admin@familypoolserviceonline.com', 'Service Request Family Pool');
   $autoRespond->addAddress($email,$name);
   $autoRespond->Subject = "Service Request Confirmation to Family Pool Service"; 
	
   $autoRespond->Body = "<body>
   
	<p style='font-family: Roboto;'>Hello Dear <strong>$name</strong><br><strong style='color: green'>Your Service request Application to Family Pool has been successiful received</strong><br>Your Request will be processed within short time and our Service board will contact you via the email or phone number you provided.</p>
	
	<p style='font-family: Roboto;'>Thank you for your love with Family Pool Serivice</p>
	
	<p style='font-family: Roboto'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	
	<p 'style=font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<p style='font-family: Roboto;font-weight: 500'>From: admin@familypoolserviceonline.com</p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Contact Chief System Designer<a href= 'mailto:joshuajayrous@gmai.com' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'>Joshua Jayrous </a></p>
	</body>";

   $autoRespond->Send(); 
}


						//////////////////////////////////////////////
						////////////AUTO RESPONSE EMAIL/////////////////
						//E//M//A//I//L//R//E//S//P//O//N//D//E//R/////
						//////////////////////////////////////////////

	?>

<?php


	/*$mail2 = new PHPMailer();

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
	<img src='images/logo.png' width='100px'>
	<p  style='font-family:helvetica;'>Hello Dear <strong>$fname $sname</strong><br>Your Service Application to Family Pool Service Job Offer has been successiful received<br>Your Request will be processed within short time and our Service board will contact you via the email or phone number you provided.</p>
	<p style='font-family: Roboto;'>Thank you for your love with Family Pool Serivice</p>
	<p style='font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<p style='font-family: Roboto;font-weight: 600'>From: admin@familypoolserviceonline.com</p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Chief Designer. joshuajayrous@gmai.com</p>
	
	</body>";

    if(!$mail2->send())
    {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail2->ErrorInfo;
        exit;
    }*/

?>
