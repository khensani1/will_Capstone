<?php
session_start();  // Start session to manage admin privileges

// Include your database connection script
include 'components/connect.php';  // Adjust the path as necessary

// Debugging: Check if session variables are being set correctly
if (!isset($_SESSION['user_role'])) {
    die("Error: User role not set in the session.");
}

// Check if the user is logged in and is an admin
if ($_SESSION['user_role'] !== 'admin') {
    // Redirect to login page if the user is not an admin
    header('Location: login.php');
    exit();  // Ensure no further code is executed
}

// Initialize success and error message variables
$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);  // Ensure the user_id is treated as an integer

        try {
            // Prepare the DELETE SQL statement using PDO to prevent SQL injection
            $stmt = $conn->prepare("DELETE FROM user WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) { 
                // Check if a user was actually deleted
                if ($stmt->rowCount() > 0) {
                    $success_message = "User with ID $user_id has been deleted successfully.";
                } else {
                    $error_message = "No user found with ID $user_id.";
                }
            } else {
                $error_message = "Failed to delete the user. Please try again.";
            }
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    } else {
        $error_message = "Please provide a valid user ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            margin: 10px 0;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Admin: Delete User</h1>

    <!-- Display success message -->
    <?php if (!empty($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <!-- Display error message -->
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <!-- Form for admin to enter user_id to delete -->
    <form method="POST" action="delete_user.php">
        <label for="user_id">Enter User ID to delete:</label>
        <input type="number" id="user_id" name="user_id" required>
        <button type="submit">Delete User</button>
    </form>
</div>

</body>
</html>
