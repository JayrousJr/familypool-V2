<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
			$con = mysqli_connect('localhost','u969269024_Familypool','Eliakimu1','u969269024_Familypool');
			if($con){
				if(isset($_REQUEST['submit'])){
					if(isset($_POST['submit']))
					{
						$fname="";
						if(isset($_POST['fname'])){
							$fname = $_POST['fname'];
						}
						$sname="";
							if(isset($_POST['sname'])){
								$sname = $_POST['sname'];
							}
						$streetAddress="";
						if(isset($_POST['streetAddress'])){
							$streetAddress = $_POST['streetAddress'];
						}
						$city="";
						if(isset($_POST['city'])){
							$city = $_POST['city'];
						}
						$state="";
						if(isset($_POST['state'])){
							$state= $_POST['state'];
						}
						$zip="";
						if(isset($_POST['zip'])){
							$zip = $_POST['zip'];
						}
						$email="";
						if(isset($_POST['email'])){
							$email = $_POST['email'];
						}
						$phone="";
						if(isset($_POST['phone'])){
							$phone =$_POST['phone'];
						}
						if(isset($_POST['age'])){
							$age = $_POST['age'];
							mysql_query("INSERT INTO applicant_tb (age) VALUES ('$age')");
						}
						
						$checkbox = $_POST['age'];
						for($i=0;$i<sizeof($checkbox);$i++){
							$query="INSERT INTO applicant_tb(age) VALUES (' ".$checkbox." ')";
							mysql_query($query) or die (mysql_error());
						}
						
						$sql="INSERT INTO applicant_tb (fname,sname,streetAddress,city,state,zip,email,phone,age) VALUES('$fname','$sname','$streetAddress','$city','$state','$zip','$email','$phone','$age')";
						$result = mysqli_query($con,$sql);
						if($result){
							/*echo '<p class="text-success"><strong><i class="icon-check-circle"> Message Sent Successiful, We will get back to you soon!</i></strong></p>';*/
						}
						else{
					echo 'Querry failed';
				}
			} 	
		}		
	}
		else{
			echo 'Failed to conect to the Database Please check the connections';
		}
			?>
</body>
</html>