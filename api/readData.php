<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "arduino";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

//Update the database
if (isset($_POST['toggle_Relay'])) {
	$led_id = $_POST['toggle_Relay'];	
	$sql = "SELECT * FROM relay_status WHERE id = '1';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status1'] == 0){
		echo "Relay1_is_of";
	}
	else{
		echo "Relay1_is_on";
	}	
	if($row['status2'] == 0){
		echo "Relay2_is_of";
	}
	else{
		echo "Relay2_is_on";
	}	
	if($row['status3'] == 0){
		echo "Relay3_is_of";
	}
	else{
		echo "Relay3_is_on";
	}	
	if($row['status4'] == 0){
		echo "Relay4_is_of";
	}
	else{
		echo "Relay4_is_on";
	}	
	if($row['status5'] == 0){
		echo "Relay5_is_of";
	}
	else{
		echo "Relay5_is_on";
	}
	if($row['status6'] == 0){
		echo "Relay6_is_of";
	}
	else{
		echo "Relay6_is_on";
	}
}	
?>