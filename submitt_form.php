<?php
// Include the database connection from the components folder
include 'components/connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data safely (use null coalescing operator to avoid undefined index warnings)
    $language = $_POST['language'] ?? '';
    $province = $_POST['province'] ?? '';
    $race = $_POST['race'] ?? '';
    $title = $_POST['title'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $address = $_POST['address'] ?? '';
    $schedule_meeting = $_POST['schedule_meeting'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $metropolitan = $_POST['metropolitan'] ?? '';
    $publisher_name = $_POST['publisher_name'] ?? '';
    $publisher_address = $_POST['publisher_address'] ?? '';
    $publisher_email = $_POST['publisher_email'] ?? '';
    $publisher_telephone = $_POST['publisher_telephone'] ?? '';
    $publication_date = $_POST['publication_date'] ?? '';

    // Insert into the 'form' table using prepared statements for security
    $sql = "INSERT INTO form (language, province, race, title, first_name, last_name, address, schedule_meeting, start_date, metropolitan, publisher_name, publisher_address, publisher_email, date_submitted, publisher_telephone, publication_date)
            VALUES (:language, :province, :race, :title, :first_name, :last_name, :address, :schedule_meeting, :start_date, :metropolitan, :publisher_name, :publisher_address, :publisher_email, NOW(), :publisher_telephone, :publication_date)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':language', $language);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':race', $race);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':schedule_meeting', $schedule_meeting);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':metropolitan', $metropolitan);
    $stmt->bindParam(':publisher_name', $publisher_name);
    $stmt->bindParam(':publisher_address', $publisher_address);
    $stmt->bindParam(':publisher_email', $publisher_email);
    $stmt->bindParam(':publisher_telephone', $publisher_telephone);
    $stmt->bindParam(':publication_date', $publication_date);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Redirect to view page with success message
        header("Location: view.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];  // Show the error message from PDO
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
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
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Form</h2>
        <form method="POST" action="submitt_form.php">
            <label for="language">Language:</label>
            <input type="text" id="language" name="language">

            <label for="province">Province:</label>
            <input type="text" id="province" name="province">

            <label for="race">Race:</label>
            <input type="text" id="race" name="race">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title">

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">

            <label for="schedule_meeting">Schedule Meeting:</label>
            <input type="text" id="schedule_meeting" name="schedule_meeting">

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">

            <label for="metropolitan">Metropolitan:</label>
            <input type="text" id="metropolitan" name="metropolitan">

            <label for="publisher_name">Publisher Name:</label>
            <input type="text" id="publisher_name" name="publisher_name">

            <label for="publisher_address">Publisher Address:</label>
            <input type="text" id="publisher_address" name="publisher_address">

            <label for="publisher_email">Publisher Email:</label>
            <input type="email" id="publisher_email" name="publisher_email">

            <label for="publisher_telephone">Publisher Telephone:</label>
            <input type="text" id="publisher_telephone" name="publisher_telephone">

            <label for="publication_date">Publication Date:</label>
            <input type="date" id="publication_date" name="publication_date">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
