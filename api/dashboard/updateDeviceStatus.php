<?php
    include "../../config/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $columnMapping = [
            'pompa' => 'status_pompa',
            'exhaustFan' => 'status_exhaust_fan',
            'phUp' => 'status_ph_up',
            'phDown' => 'status_ph_down',
            'nutrisiA' => 'status_nutrisi_A',
            'nutrisiB' => 'status_nutrisi_B',
        ];

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $lastSegment = end($uri);
        $column = $columnMapping[$lastSegment];
        
        if (isset($column)) {
            $status = ($_POST['status'] == 'true') ? 1 : 0;
            $update = mysqli_query($conn, "UPDATE relay_status SET $column = $status");
        }
        else {
            http_response_code(400);
            echo "Invalid endpoint";
        }
    }
    else {
        http_response_code(405);
        echo "Invalid request method";
    }

    // if(isset($_POST['topUp'])){
    //     $nominal = $_POST['nominal'];
    
    //     $update = mysqli_query($conn, "UPDATE pengguna SET e_money = $e_money + $nominal WHERE id_pengguna = '$id_pengguna'");
    // }
    $conn->close();
?>