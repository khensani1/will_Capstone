<?php
// database connection 
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
    // Validate strong password
    $password_pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
    if (!preg_match($password_pattern, $password)) {
        echo "Password must be at least 8 characters long.<br> "; 
        echo "Contain at least one uppercase letter.<br>";
        echo "One lowercase letter and one number.<br>";
        echo "Also one special character.";
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

        // Convert role to numeric value
        $role_value = 2; // Default to client
        if ($role === 'admin') {
            $role_value = 0;
        } elseif ($role === 'editor') {
            $role_value = 1;
        }

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, :role)");

        // Bind parameters
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password); 
        $stmt->bindParam(':role', $role_value);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";
            // Redirect to login page or dashboard
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (Exception $e) { // Catch any errors that occur
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
