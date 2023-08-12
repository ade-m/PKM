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
$sql = "SELECT * FROM log ORDER BY date DESC LIMIT 10"; // Adjust your query accordingly
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'date' => $row['date'],
        'temperature' => $row['temperature'],
        'humidity' => $row['humidity'],
        'ph' => $row['ph'],
        'tds' => $row['tds'],
    );
}


// Calculate the minimum and maximum values
$minValue = min(array_column($data, 'temperature'));
$maxValue = max(array_column($data, 'temperature'));

// Convert the data to JSON format
echo json_encode(array_reverse($data));

$conn->close();
?>
