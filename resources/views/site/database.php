

<?php 
	$host = "localhost";
	$dbname = "u969269024_Familypool";
	$username = "root";
	$password = "";
	
	$conn=mysqli_connect($host, $username,$password,$dbname);

	$mysqli = new mysqli($host,$username,$password,$dbname);
	
	if($mysqli->connect_errno){
		die("Connection Error!".$mysqli->connect_error);
	}
			return $mysqli;
	?>
	

