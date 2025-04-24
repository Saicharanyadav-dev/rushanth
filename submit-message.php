<?php
$host = 'localhost';
$db = 'hilstone';
$user = 'root';
$pass = ''; // Change if you have a password set

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email']);
$subject = $conn->real_escape_string($_POST['subject']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO contact_messages (full_name, email, subject, message) 
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
