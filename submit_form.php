<!-- submit_form.php -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Adjust these values based on your database setup
    $servername = "localhost"; // or the IP address of your MySQL server
    $username = "root"; // your MySQL username
    $password = ""; // your MySQL password (if set)
    $dbname = "data"; // the name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name, address, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
    $hashed_password = password_hash("default_password", PASSWORD_DEFAULT); // Use a secure hashing mechanism
    $full_name = "Contact Form Submission"; // You can customize this
    $address = ""; // You can customize this
    $phone_number = ""; // You can customize this
    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $full_name, $address, $phone_number);

    if ($stmt->execute()) {
        // Form submission successful
        echo json_encode(["status" => "success", "message" => "Form submitted successfully"]);
    } else {
        // Form submission failed
        echo json_encode(["status" => "error", "message" => "Error submitting form"]);
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
