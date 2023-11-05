<?php
    include "../../config/database.php";

    $sql = "SELECT * FROM relay_status";
    $result = $conn->query($sql);

    $data = new stdClass();
    while ($row = $result->fetch_assoc()) {
        $data->phUp = $row['status_ph_up'];
        $data->phDown = $row['status_ph_down'];
        $data->nutrisiA = $row['status_nutrisi_A'];
        $data->nutrisiB = $row['status_nutrisi_B'];
        $data->pompa = $row['status_pompa'];
        $data->exhaustFan = $row['status_exhaust_fan'];
    }

    echo json_encode($data);

    $conn->close();
?>