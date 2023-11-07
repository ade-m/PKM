<?php
$servername = "localhost";
$dBUsername = "bap21si2";
$dBPassword = "bap21si2";
$dBName = "arduino";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}


//Update the database

	$sql = "SELECT CONCAT_WS('|', A.`status_ph_up`, A.`status_ph_down`, A.`status_nutrisi_A`, A.`status_nutrisi_B`, A.`status_pompa`, A.`status_exhaust_fan`,
				B.kebun,
				B.tanaman,
				B.dPData,
				B.dPPestisida,
				B.dPPh,
				B.dPPpm,
				B.dPExhausFan) status
			FROM `relay_status` A
			JOIN `config` B";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	echo "{".$row['status']."}";
	
?>