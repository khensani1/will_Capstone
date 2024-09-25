<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Initialize form ID variable
$form_id = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_form'])) {
    
    // Include the database connection file
    include 'components/connect.php'; // Connection setup via external file

    // Sanitize the input
    $form_id = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Updated line

    if (!empty($form_id)) {
        try {
            // Check if the form exists before trying to delete it
            $check_sql = "SELECT * FROM form WHERE form_id = :form_id";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bindParam(':form_id', $form_id, PDO::PARAM_STR);
            $check_stmt->execute();

            // If the form exists, proceed to delete
            if ($check_stmt->rowCount() > 0) {
                // SQL query to delete the form
                $delete_sql = "DELETE FROM form WHERE form_id = :form_id";
                $delete_stmt = $conn->prepare($delete_sql);
                $delete_stmt->bindParam(':form_id', $form_id, PDO::PARAM_STR);

                if ($delete_stmt->execute()) {
                    echo "Form with ID $form_id has been deleted successfully.";
                } else {
                    echo "Error deleting the form. Please try again.";
                }
            } else {
                echo "Form with ID $form_id does not exist.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Please enter a valid form ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #c9302c;
        }
        .message {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Delete a Form</h1>
        
        <!-- Form to enter the form_id to be deleted -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="form_id">Enter Form ID to Delete:</label>
                <input type="text" id="form_id" name="form_id" required>
            </div>

            <div class="form-group">
                <button type="submit" name="delete_form">Delete Form</button>
            </div>
        </form>

    </div>
</body>
</html>
