
<?php
	$email = $_POST["email"];
	$name = "CrytoMug";
	if(empty($_POST["name"])){
		die("Name field is required!");
	}

	if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
		die("Enter a valid email address");
	}

	if(empty($_POST["subject"])){
		die("Subject field is required!");
	}

	if(empty($_POST["message"])){
		die("Message field is required!");
	}
	if($name==='CrytoMug'){
		header("Location: denie.html");
		exit;
	}
	$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$messageid = substr(str_shuffle($set), 0, 15);
	$mysqli = require __DIR__ ."/database.php";
	

	$sql = "INSERT INTO message_tb (messageid,name,email,subject,message) VALUES('$messageid',?,?,?,?)";
	$stmt = $mysqli->stmt_init();
	
	if(!$stmt -> prepare($sql)){
		die("<br>SQL Error:: ".$mysqli->error);
	}
	$stmt->bind_param("ssss",
					 $_POST["name"],
					 $_POST["email"],
					 $_POST["subject"],
					 $_POST["message"]
					 );
	if($stmt->execute()){
		//returns true if it is successifu
	header("Location: sent.html");
	}
	else
		{
		die($mysqli->error." ".$mysqli->errno);
		exit;
		}


		//MAILING SYSTEM
	$email = $_POST["email"];
 	$name = $_POST["name"];
	$name = trim($name);
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
	$mail->Password = "temp () Password";
 	//set type of protection
	$mail->SMTPSecure = "ssl"; // "tls"
	//set prot
	$mail->Port = 465; // or 587 for tls
	//set subject
	$mail->Subject = "Message From Family Pool Service";
	$mail->isHTML(true);
	//set body
	$mail->Body = "<body>
	<p  style='font-family: Roboto;'>New Message has been sent to your Site <strong>Family Pool Service</strong> from customer <strong>$name</strong></p>
	<p style='font-family: Roboto;'>For more details about this message please visit the site  <a href= 'https://familypoolserviceonline.com/systemadmin/admin/home.php' style='text-decoration: none;color: #0859A4;font-weight: 600'>Administrator Dashboard</a></p>
	<p 'style=font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
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
	
   $autoRespond->setFrom('admin@familypoolserviceonline.com', 'Message Family Pool');
   $autoRespond->addAddress($email,$name);
   $autoRespond->Subject = "Message Receiving Confirmation"; 
   $autoRespond->Body = "<body>
   
	<p style='font-family: Roboto;'>Hello Dear <strong>$name</strong><br><strong style='color: green'>Your Message to Family Pool Service was received successiful</strong> </p>
	
	<p style='font-family: Roboto;'>We are glad to say thank you for visiting ous Site and Contacting us,<br> Your feedback is more important to the development of Services to serve the whole USA</p>
	
	<p style='font-family: Roboto'>Please help Family Pool Service by sharing with friends about our service</p>
	<p style='font-family: Roboto'>You can apply for Service you wish <a href= 'https://familypoolserviceonline.com/systemadmin/admin/home.php' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'>here</a> Or Ask for Technician job at <a href= 'https://familypoolserviceonline.com/systemadmin/admin/home.php' target=_'blank' style='text-decoration: none;color: #0859A4;font-weight: 600'>Family Pool Service</a>
	</p>
	<p 'style=font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
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
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 465;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above



    $mail2->From = 'admin@familypoolserviceonline.com';

    // below we want to set the email address we will be sending our email to.
    $mail2->addAddress($email,$fname);

    
    // set email format to HTML
    $mail2->IsHTML(true);

   $mail2->Subject = "Message Receiving Confirmation";

    $mail2->Body = "<body>
	<p style='font-family: Roboto;'>Hello Dear <strong>$name</strong><br><strong style='color: green'>Your Message to Family Pool Service was received successiful.</strong> </p>
	
	<p style='font-family: Roboto;'>We are glad to say thank you for visiting ous Site and Contacting us,<br> Your feedback is more important to the development of Services to serve the whole USA</p>
	
	<p style='font-family: Roboto'>Please help Family Pool Service by sharing with friends about our service</p>
	<p style='font-family: Roboto'>You can apply for Service you wish <a style='text-decoration: none' href='https://familypoolserviceonline.com/' target='_blank'>here</a> Or Ask for Technician job at <a style='text-decoration: none' href='https://familypoolserviceonline.com/applicationform.php' target=_'blank'>Family Pool Service</a>
	</p>
	<p 'style=font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;'>Copyrights 2022 TechClouds.com </p>
	<p style='font-weight: 700;font-family: Roboto;'>Chief Designer. joshuajayrous@gmai.com</p>
	
	
	
</body>";

    if(!$mail2->send())
    {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail2->ErrorInfo;
        exit;
    }

*/
?>




			<?php /*?>
			
<?php
//auto matic response
	$email = $_POST["email"];
 	$name = $_POST["name"];
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
	$mail->Password = "temp () Password";
 	//set type of protection
	$mail->SMTPSecure = "tls"; // "tls"
	//set prot
	$mail->Port = 587; // or 587 for tls
	//set subject
	$mail->Subject = "Message Receiving Confirmation";
	$mail->isHTML(true);
	//set body
	$mail->Body = "
	<body>
	<p style='font-family: Roboto;'>Hello Dear <strong>$name</strong><br><strong style='color: green'>Your Message to Family Pool Service was received successiful.</strong> </p>
	
	<p style='font-family: Roboto;'>We are glad to say thank you for visiting ous Site and Contacting us,<br> Your feedback is more important to the development of Services to serve the whole USA</p>
	
	<p style='font-family: Roboto'>Please help Family Pool Service by sharing with friends about our service</p>
	<p style='font-family: Roboto'>You can apply for Service you wish <a style='text-decoration: none' href='https://familypoolserviceonline.com/' target='_blank'>here</a> Or Ask for Technician job at <a style='text-decoration: none' href='https://familypoolserviceonline.com/applicationform.php' target=_'blank'>Family Pool Service</a>
	</p>
	<p 'style=font-family: Roboto;font-weight: 400'>Family Pool Service is dedicated to give you the best and quality pool services for your pool. join Family Pool Community for best Pool servies</p>
	<hr>
	<p style='font-weight: 700;font-family: Roboto;>Copyrights 2022 TechClouds.com </p> 
	<p style=font-weight: 700;font-family: Roboto;font-weight: 700>Chief Designer. joshuajayrous@gmai.com</p>
	
	
</body>";
	//set who is sending an email
	$mail->setFrom('admin@familypoolserviceonline.com','Family Pool Service');
	//set where we aresending email(recipients)
	//$mail->addAddress('admin@familypoolserviceonline.com');
	$mail->addAddress($email,$name);
	$mail->addReplyTo($email);
	//send an email
	if($mail->send()){
		echo 'Mail Sent';
	}
	else{
		echo 'Mail Sending filed';
	}

?>

<?php
//Sending Message to the Admini After Userr Sending message
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->isHTML(true);
$mail->Username = "admin@familypoolserviceonline.com";
$mail->Password = "password";

$mail->setFrom($email, $name);
$mail->addAddress("admin@familypoolserviceonline.com", "Family Pool Service");

$mail->Subject = "Message From Family Pool Service";
$mail->Body = "New message from our web user name $name.\n\n"."Sender's address: $visitor_email \nFor more information 				visit Administrator panel". " https://healingvoiceministry.com/systemadmin/admin/index.php\n\n"."From: 					admin@healingvoiceministry.com". "\n\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. 				joshuajayrous@gmai.com";

$mail->send();

header("Location: sent.html");
?>
<?php
//Automatic reply of message
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "admin@familypoolserviceonline.com";
$mail->Password = "password";

$mail->setFrom("admin@familypoolserviceonline.com", "Family Pool Service");
$mail->addAddress("admin@familypoolserviceonline.com", "Family Pool Service");

$mail->Subject = "Message From Family Pool Service";
$mail->Body = "Hello Dear $name \n\nYour Message to Family Pool Service was received successiful. \n\nWe are glad to say thank you for visiting ous Site and Contacting us.\n\n"."Your feedback is more important to the development of Services to serve the whole USA\n\n"."Please help Family Pool Service by sharing with friends about our service"."From: admin@familypoolserviceonline.com". "\n\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. joshuajayrous@gmai.com";

$mail->send();

header("Location: sent.html");
?><?php
			if(isset($_POST['email']) && ($_POST['email'] != '')){
				if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
				  $name = $_POST['name'];
				  $subject = $_POST['subject'];
				  $visitor_email = $_POST['email'];
				  $email_from = 'admin@familypoolserviceonline.com';
				
				  $email_id = 'User Family Pool Services admin@familypoolserviceonline.com';
				$email_subject = "New Message From your Website";

				$email_body = "New message from our web user name $name.\n\n"."Sender's address: $visitor_email \nFor more information visit Administrator panel". " https://healingvoiceministry.com/systemadmin/admin/index.php\n\n"."From: admin@healingvoiceministry.com". "\n\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. joshuajayrous@gmai.com";

			  $to = "admin@familypoolserviceonline.com";

			  $headers = "From: $email_id \r\n";

			  $headers .= "Reply-To: $visitor_email \r\n";
					
			$header .= "Content-type: text/html\r\n";
			//sending email
			 mail($to,$email_subject,$email_body,$headers);
				}
					}
		 ?> 
	
			<?php
			if(isset($_POST['email']) && $_POST['email'] != ''){
				if( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)){
				  $name = $_POST['name'];
				  $visitor_email = $_POST['email'];
				  $message = $_POST['message'];
				  $visitor_from = 'admin@familypoolserviceonline.com';
				 $email_id = 'Family Pool Services admin@familypoolserviceonline.com';
				$email_subject = "Message Receive Confirmation";

				$email_body = "Hello Dear $name \n\nYour Message to Family Pool Service was received successiful. \n\nWe are glad to say thank you for visiting ous Site and Contacting us.\n\n"."Your feedback is more important to the development of Services to serve the whole USA\n\n"."Please help Family Pool Service by sharing with friends about our service"."From: admin@familypoolserviceonline.com". "\n\n\n\n\n\n\n\n\n\n\n\nCopyrights 2022 TechClouds.com\n\n"."Chief Designer. joshuajayrous@gmai.com";

			  $to = "$visitor_email";

			  $headers = "From: $email_id \r\n";

			  $headers .= "Reply-To: $visitor_from \r\n";
					
			$header .= "Content-type: text/html\r\n";
			//sending email
			 mail($to,$email_subject,$email_body,$headers);
				}
			}
		 ?> <?php */?>