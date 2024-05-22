<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "external_alarm_master";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $port = $_POST['port'];
    $slogan = $_POST['slogan']; // Changed variable name to be consistent with 'name' in the POST request
    $severity = $_POST['severity'];
    $normallyopen = $_POST['normallyopen'];

    // Check if the port and name combination already exists
    $check_sql = "SELECT COUNT(*) FROM master_alarm WHERE port = ? AND slogan = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("is", $port, $slogan);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        echo "The alarm with the specified port and slogan already exists.";
    } else {
        $insert_sql = "INSERT INTO master_alarm (port, slogan, severity, normallyopen) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isss", $port, $slogan, $severity, $normallyopen);

        if ($insert_stmt->execute()) {
            echo "New alarm added successfully";
        } else {
            echo "Error: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }
}


$conn->close();
?>
