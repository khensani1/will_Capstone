<?php
$servername = "192.168.0.43"; // Server's IP address
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "publications"; // Rename the database to avoid special characters

try {
    // Create the DSN string (correct format for MySQL)
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    
    // Create a PDO instance (connect to the database)
    $conn = new PDO($dsn, $username, $password);
    
    // Set PDO error mode to exception to handle errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully"; // Optional: for testing connection
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
