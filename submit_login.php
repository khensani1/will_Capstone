<?php
session_start();
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
            // Start session and set user info
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            // Redirect to the appropriate page based on the user's role
            switch ($user['role']) {
                case 0:
                    header("Location: admin_dashboard.php");
                    break;
                case 1:
                    header("Location: editor_dashboard.php");
                    break;
                case 2:
                    header("Location: client_dashboard.php");
                    break;
                default:
                    echo "Invalid user role.";
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}


