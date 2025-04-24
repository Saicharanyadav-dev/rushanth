<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hilstone";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    
    if ($stmt->execute()) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

