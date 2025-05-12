<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = "localhost";
    $user = "root";
    $password = ""; // Empty for XAMPP
    $database = "contact_db";

    // Create connection
    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate input (basic)
    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required!";
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request method!";
}
?>
