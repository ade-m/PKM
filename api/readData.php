<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "arduino";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

//Read the database
if (isset($_POST['check_LED_status'])) {
	$led_id = $_POST['check_LED_status'];	
	$sql = "SELECT * FROM LED_status WHERE id = '$led_id';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status'] == 0){
		echo "LED_is_off";
	}
	else{
		echo "LED_is_on";
	}	
}	

//Update the database
if (isset($_POST['toggle_Relay'])) {

	$led_id = $_POST['toggle_Relay'];	
	$sql = "SELECT * FROM relay_status WHERE id = '1';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status1'] == 0){
		//$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");
		echo "Relay_is_of";
	}
	else{
		echo "Relay_is_on";
	}	
	if($row['status2'] == 0){
		//$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");
		echo "Relay_is_of";
	}
	else{
		echo "Relay_is_on";
	}
	if($row['status3'] == 0){
		//$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");
		echo "Relay_is_of";
	}
	else{
		echo "Relay_is_on";
	}
	if($row['status4'] == 0){
		//$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");
		echo "Relay_is_of";
	}
	else{
		echo "Relay_is_on";
	}
	if($row['status5'] == 0){
		//$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");
		echo "Relay_is_of";
	}
	else{
		echo "Relay_is_on";
	}
}	
?>