<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Include the database connection
include 'components/connect.php';

// Initialize forms variable
$forms = [];  // Initialize as an empty array

try {
    // Prepare SQL statement to fetch all records
    $sql = "SELECT * FROM form";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all records
    $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Forms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Submitted Forms</h1>
        <table>
            <tr>
                <th>Form ID</th>
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
            <?php foreach ($forms as $form): ?>
                <tr>
                    <td><?php echo htmlspecialchars($form['form_id']); ?></td>
                    <td><?php echo htmlspecialchars($form['language']); ?></td>
                    <td><?php echo htmlspecialchars($form['province']); ?></td>
                    <td><?php echo htmlspecialchars($form['race']); ?></td>
                    <td><?php echo htmlspecialchars($form['title']); ?></td>
                    <td><?php echo htmlspecialchars($form['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($form['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($form['address']); ?></td>
                    <td><?php echo htmlspecialchars($form['addressOf']); ?></td>
                    <td><?php echo htmlspecialchars($form['nameOfcurator']); ?></td>
                    <td><?php echo htmlspecialchars($form['addressCurator']); ?></td>
                    <td><?php echo htmlspecialchars($form['schedule_meeting']); ?></td>
                    <td><?php echo htmlspecialchars($form['start_date']); ?></td>
                    <td><?php echo htmlspecialchars($form['metropolitan']); ?></td>
                    <td><?php echo htmlspecialchars($form['publisher_name']); ?></td>
                    <td><?php echo htmlspecialchars($form['publisher_address']); ?></td>
                    <td><?php echo htmlspecialchars($form['publisher_email']); ?></td>
                    <td><?php echo htmlspecialchars($form['date_submitted']); ?></td>
                    <td><?php echo htmlspecialchars($form['publisher_telephone']); ?></td>
                    <td><?php echo htmlspecialchars($form['publication_date']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
