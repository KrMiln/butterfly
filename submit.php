<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ??'';
$message = $_POST['message'] ?? '';

if(empty($name) || empty($email) || empty($message)) {
    die('All fields are required.');
}

$host = 'localhost';
$dbname = 'butterfly_db';
$username = 'butterfly_u';
$pass = 'TL8EHuw9ST1nQVA';

$conn = mysqli_connect($host, $username, $pass, $dbname);

if($conn->connect_error) {
    die('Connection failed.' . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if($stmt->execute()) {
    echo "Message received. Thank you";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();