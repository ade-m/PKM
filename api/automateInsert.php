<?php
    include "../config/database.php";

    for ($i=0; $i < 50; $i++) { 
        $humidity = 72;
        $temperature = 27.12 + mt_rand() / mt_getrandmax() * (27.16 - 27.12);
        $ph = 6.2 + mt_rand() / mt_getrandmax() * (6.3 - 6.2);
        $tds = 1105 + mt_rand() / mt_getrandmax() * (1205 - 1105);

        $query = "INSERT INTO log (humidity , temperature , ph , tds) 
                VALUES ( '".$humidity."','".$temperature."','".$ph."','".$tds."')";

        if ($conn->query($query) === TRUE) {
            echo "Berhasil menyimpan data ke table log";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        sleep(5);
    }
?>