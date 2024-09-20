<?php
session_start(); // Start session at the beginning of the script
include 'components/connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture input data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

            // Redirect to the appropriate page based on the user's role
            if ($user['role'] === 'admin') {
                header("Location: admin_dashboard.php");
                exit(); // Exit after header to prevent further script execution
            } elseif ($user['role'] === 'editor') {
                header("Location: editor_dashboard.php");
                exit();
            } elseif ($user['role'] === 'client') {
                header("Location: client_dashboard.php");
                exit();
            } else {
                echo "Invalid user role.";
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
