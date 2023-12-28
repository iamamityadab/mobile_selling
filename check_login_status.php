<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION["username"]);

// Send JSON response
header('Content-Type: application/json');
echo json_encode(["isLoggedIn" => $isLoggedIn, "username" => $_SESSION["username"] ?? null]);
?>
