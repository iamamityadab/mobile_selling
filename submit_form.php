
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "data"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name, address, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
    $hashed_password = password_hash("default_password", PASSWORD_DEFAULT); 
    $full_name = "Contact Form Submission"; 
    $address = ""; 
    $phone_number = ""; 
    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $full_name, $address, $phone_number);

    if ($stmt->execute()) {
       
        echo json_encode(["status" => "success", "message" => "Form submitted successfully"]);
    } else {
        
        echo json_encode(["status" => "error", "message" => "Error submitting form"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
