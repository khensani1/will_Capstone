<?php
// Include the database connection file (assuming it establishes a PDO connection)
include 'components/connect.php'; 

// Fetch users who already have an account
$sql = "SELECT user_id, first_name, last_name, email, password, created_date, updated_date, role FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Get the number of rows returned by the query
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - View Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .no-users {
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Users List</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php
        if (count($users) > 0) {
            // Output data of each row
            foreach ($users as $row) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>"; // Display user ID
                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>"; // Display full name
                echo "<td>" . $row["email"] . "</td>"; // Display email
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3' class='no-users'>No users found</td></tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
// No need for $conn->close() in PDO
?>
