<?php
  include "../config/database.php";

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