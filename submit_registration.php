<?php
// Include the database connection file (assuming it returns a PDO instance)
include 'components/connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword) || empty($role)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Check if the email already exists
        $email_check_query = "SELECT * FROM user WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($email_check_query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "Email already exists. Please use a different email.";
            exit();
        }

        // Insert the user into the database
        $query = "INSERT INTO user (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, :role)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            echo "Registration successful!";
            // Redirect to a login page or another page
            header("Location: login.php");
            exit();
        } else {
            echo "Error: Could not complete registration.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
