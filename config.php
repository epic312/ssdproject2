<?php
// Database connection
$dsn = "mysql:host=localhost;dbname=secure_login;charset=utf8mb4";
$dbUsername = "root"; // Change this to your DB username
$dbPassword = ""; // Change this to your DB password

try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>