<?php
// Connect to the database (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arduino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM log ORDER BY date DESC"; // Adjust your query accordingly
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'id' => $row['id'],
        'date' => $row['date'],
        'ph' => $row['ph'],
    );
}

// Convert the data to JSON format
echo json_encode($data);

$conn->close();
?>