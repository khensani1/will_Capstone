<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = $_POST['last_name'];
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $role = $_POST['role'];
    $role = filter_var($role, FILTER_SANITIZE_STRING);
    $password = sha1($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $cpassword = sha1($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'Email already exists!';
    } else {
        if ($password != $cpassword) {
            $message[] = 'Confirm password not matched!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `user`(first_name, last_name, email, password, created_date, updated_date, role) VALUES(?,?,?,?,?,?,?)");
            $insert_user->execute([$first_name, $last_name, $email, $cpassword, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $role]);
            $message[] = 'Registered successfully, login now please!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PontshoProject</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            background-image: url('ice.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #3498db;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>

        <form action="submit_registration.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required onchange="toggleEmployeeFields()">
                    <option value="" disabled selected>Select your Role</option>
                    <option value="admin">Administrator</option>
                    <option value="editor">Editor</option>
                    <option value="client">Client</option>
                </select>
            </div>

            <!-- Employee Number Field (Initially Hidden) -->
            <div class="form-group" id="employee-number-group" style="display: none;">
                <label for="employee_number">Employee Number:</label>
                <input type="text" id="employee_number" name="employee_number">
            </div>

    


            <!-- Rights Field (Hidden) -->
            <input type="hidden" id="rights" name="rights">

            <button type="submit" name="submit">Register</button>

            <div class="link">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>

        <script>
            function toggleEmployeeFields() {
                var role = document.getElementById('role').value;
                var employeeNumberGroup = document.getElementById('employee-number-group');
                var rightsField = document.getElementById('rights');

                if (role === 'admin') {
                    employeeNumberGroup.style.display = 'block';
                    rightsField.value = '0'; // Rights set to 0 for admin
                } else if (role === 'editor') {
                    employeeNumberGroup.style.display = 'block';
                    rightsField.value = '1'; // Rights set to 1 for editor
                } else {
                    employeeNumberGroup.style.display = 'none';
                    rightsField.value = ''; // No rights for clients
                }
            }
        </script>

    </div>
</body>

</html>