<?php

// Start session at the beginning of the script
session_start();

// Include the database connection from the external file
include 'components/connect.php';

// Check if the user role is set in the session
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest'; // Default to 'Guest' if role is not set

// Query to fetch data from the table 'form'
$sql = "SELECT * FROM form"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display success message if form is submitted -->
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p class='success'>Form submitted successfully!</p>";
        }
        ?>

        <!-- Only display the table if the user is an Admin or Editor -->
        <?php if ($user_role == 'Admin' || $user_role == 'Editor'): ?>
            <h2>Notice of Curator and Tutor Submissions</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Language</th>
                    <th>Province</th>
                    <th>Race</th>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>addressOf</th>
                    <th>nameOfcurator</th>
                    <th>addressCurator</th>
                    <th>Schedule Meeting</th>
                    <th>Start Date</th>
                    <th>Metropolitan</th>
                    <th>Publisher Name</th>
                    <th>Publisher Address</th>
                    <th>Publisher Email</th>
                    <th>Date Submitted</th>
                    <th>Publisher Telephone</th>
                    <th>Publication Date</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["form_id"] . "</td>";
                        echo "<td>" . $row["language"] . "</td>";
                        echo "<td>" . $row["province"] . "</td>";
                        echo "<td>" . $row["race"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["first_name"] . "</td>";
                        echo "<td>" . $row["last_name"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["addressOf"] . "</td>";
                        echo "<td>" . $row["nameOfcurator"] . "</td>";
                        echo "<td>" . $row["addressCurator"] . "</td>"; 
                        echo "<td>" . $row["schedule_meeting"] . "</td>";
                        echo "<td>" . $row["start_date"] . "</td>";
                        echo "<td>" . $row["metropolitan"] . "</td>";
                        echo "<td>" . $row["publisher_name"] . "</td>";
                        echo "<td>" . $row["publisher_address"] . "</td>";
                        echo "<td>" . $row["publisher_email"] . "</td>"; 
                        echo "<td>" . $row["date_submitted"] . "</td>";
                        echo "<td>" . $row["publisher_telephone"] . "</td>";
                        echo "<td>" . $row["publication_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17'>No data found</td></tr>";
                }
                $conn->close();
                ?>
            </table>
        <?php else: ?>
            
        <?php endif; ?>
    </div>
</body>
</html>
