<?php
include 'components/connect.php';

session_start(); // Start session at the beginning

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
            // Start session and set user info
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

            // Redirect to the appropriate page based on the user's role
            if ($user['role'] === 'admin') {
                header("Location: admin_dashboard.php"); // Redirect to admin dashboard
                exit();
            } elseif ($user['role'] === 'editor') {
                header("Location: editor_dashboard.php"); // Redirect to editor dashboard
                exit();
            } elseif ($user['role'] === 'client') {
                header("Location: client_dashboard.php"); // Redirect to client dashboard
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


