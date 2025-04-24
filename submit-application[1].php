<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hilstone";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $position = $_POST['position'];

    if (isset($_FILES["resume"])) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        $target_file = $target_dir . basename($_FILES["resume"]["name"]);

        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO applications (name, email, position, resume_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $position, $target_file);

            if ($stmt->execute()) {
                echo "Application submitted successfully.";
            } else {
                echo "Error: " . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Failed to upload resume.";
        }
    } else {
        echo "No resume uploaded.";
    }
}
$conn->close();
?>
