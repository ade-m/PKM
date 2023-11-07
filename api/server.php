<?php
$servername = "localhost";
$dBUsername = "bap21si2";
$dBPassword = "bap21si2";
$dBName = "arduino";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

  if(!empty($_POST)){

    $humidity = $_POST["humidity"];
    $temperature = $_POST["temperature"];
    $ph = $_POST["ph"];
    $tds = $_POST["tds"];

    $query = "INSERT INTO log (humidity , temperature , ph , tds) 
              VALUES ( '".$humidity."','".$temperature."','".$ph."','".$tds."')";

    if ($conn->query($query) === TRUE) {
      echo "Berhasil menyimpan data ke table log";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
    echo "Data Tidak Ditemukan";
  }

?>