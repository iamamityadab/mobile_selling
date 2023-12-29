<?php
session_start();

$isLoggedIn = isset($_SESSION["username"]);

header('Content-Type: application/json');
echo json_encode(["isLoggedIn" => $isLoggedIn, "username" => $_SESSION["username"] ?? null]);
?>
