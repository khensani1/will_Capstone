<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Initialize variables with empty values
$form_data = [
    'form_id' => '',
    'language' => '',
    'province' => '',
    'race' => '',
    'title' => '',
    'first_name' => '',
    'last_name' => '',
    'address' => '',
    'addressOf' => '',
    'nameOfcurator' => '',
    'addressCurator' => '',
    'schedule_meeting' => '',
    'start_date' => '',
    'metropolitan' => '',
    'publisher_name' => '',
    'publisher_address' => '',
    'publisher_email' => '',
    'date_submitted' => '',
    'publisher_telephone' => '',
    'publication_date' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['load_record'])) {
    
    // Include the database connection file
    include 'components/connect.php'; // Connection setup via external file

    try {
        
        $form_id = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Prepare SQL statement to fetch the record based on form_id
        $sql = "SELECT * FROM form WHERE form_id = :form_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':form_id', $form_id, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the record and populate the form fields
        if ($stmt->rowCount() > 0) {
            $form_data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch as an associative array
        } else {
            echo "No records found for this Form ID.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_record'])) {
    
    // Include the database connection file
    include 'components/connect.php'; // Connection setup via external file

    try {
        // Retrieve and sanitize form data
        $form_id = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $language = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $race = filter_input(INPUT_POST, 'race', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $addressOf = filter_input(INPUT_POST, 'addressOf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nameOfcurator = filter_input(INPUT_POST, 'nameOfcurator', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $addressCurator = filter_input(INPUT_POST, 'addressCurator', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $schedule_meeting = filter_input(INPUT_POST, 'schedule_meeting', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $start_date = filter_input(INPUT_POST, 'start_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $metropolitan = filter_input(INPUT_POST, 'metropolitan', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publisher_name = filter_input(INPUT_POST, 'publisher_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publisher_address = filter_input(INPUT_POST, 'publisher_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publisher_email = filter_input(INPUT_POST, 'publisher_email', FILTER_SANITIZE_EMAIL);
        $date_submitted = filter_input(INPUT_POST, 'date_submitted', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publisher_telephone = filter_input(INPUT_POST, 'publisher_telephone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publication_date = filter_input(INPUT_POST, 'publication_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // SQL query for updating the record
        $sql = "
            UPDATE form SET
                language = :language,
                province = :province,
                race = :race,
                title = :title,
                first_name = :first_name,
                last_name = :last_name,
                address = :address,
                addressOf = :addressOf,
                nameOfcurator = :nameOfcurator,
                addressCurator = :addressCurator,
                schedule_meeting = :schedule_meeting,
                start_date = :start_date,
                metropolitan = :metropolitan,
                publisher_name = :publisher_name,
                publisher_address = :publisher_address,
                publisher_email = :publisher_email,
                date_submitted = :date_submitted,
                publisher_telephone = :publisher_telephone,
                publication_date = :publication_date
            WHERE form_id = :form_id
        ";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':form_id', $form_id);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':race', $race);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':addressOf', $addressOf);
        $stmt->bindParam(':nameOfcurator', $nameOfcurator);
        $stmt->bindParam(':addressCurator', $addressCurator);
        $stmt->bindParam(':schedule_meeting', $schedule_meeting);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':metropolitan', $metropolitan);
        $stmt->bindParam(':publisher_name', $publisher_name);
        $stmt->bindParam(':publisher_address', $publisher_address);
        $stmt->bindParam(':publisher_email', $publisher_email);
        $stmt->bindParam(':date_submitted', $date_submitted);
        $stmt->bindParam(':publisher_telephone', $publisher_telephone);
        $stmt->bindParam(':publication_date', $publication_date);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            echo "Record updated successfully!";
        } else {
            echo "Error updating record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .radio-group label {
            margin-right: 10px;
            font-size: 14px;
            color: #555;
        }
        .form-group button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .radio-group {
            display: flex;
            gap: 20px;
        }
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .form-group select {
            padding: 10px;
        }
        .form-group button {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Update Form</h1>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="form_id">Form ID</label>
                <input type="text" name="form_id" id="form_id" value="<?php echo htmlspecialchars($form_data['form_id']); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="load_record">Load Record</button>
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" name="language" id="language" value="<?php echo htmlspecialchars($form_data['language']); ?>">
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" name="province" id="province" value="<?php echo htmlspecialchars($form_data['province']); ?>">
            </div>
            <div class="form-group">
                <label for="race">Race</label>
                <input type="text" name="race" id="race" value="<?php echo htmlspecialchars($form_data['race']); ?>">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($form_data['title']); ?>">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($form_data['first_name']); ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($form_data['last_name']); ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($form_data['address']); ?>">
            </div>
            <div class="form-group">
                <label for="addressOf">Address of</label>
                <input type="text" name="addressOf" id="addressOf" value="<?php echo htmlspecialchars($form_data['addressOf']); ?>">
            </div>
            <div class="form-group">
                <label for="nameOfcurator">Name of Curator</label>
                <input type="text" name="nameOfcurator" id="nameOfcurator" value="<?php echo htmlspecialchars($form_data['nameOfcurator']); ?>">
            </div>
            <div class="form-group">
                <label for="addressCurator">Address of Curator</label>
                <input type="text" name="addressCurator" id="addressCurator" value="<?php echo htmlspecialchars($form_data['addressCurator']); ?>">
            </div>
            <div class="form-group">
                <label for="schedule_meeting">Schedule Meeting</label>
                <input type="text" name="schedule_meeting" id="schedule_meeting" value="<?php echo htmlspecialchars($form_data['schedule_meeting']); ?>">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="<?php echo htmlspecialchars($form_data['start_date']); ?>">
            </div>
            <div class="form-group">
                <label for="metropolitan">Metropolitan</label>
                <input type="text" name="metropolitan" id="metropolitan" value="<?php echo htmlspecialchars($form_data['metropolitan']); ?>">
            </div>
            <div class="form-group">
                <label for="publisher_name">Publisher Name</label>
                <input type="text" name="publisher_name" id="publisher_name" value="<?php echo htmlspecialchars($form_data['publisher_name']); ?>">
            </div>
            <div class="form-group">
                <label for="publisher_address">Publisher Address</label>
                <input type="text" name="publisher_address" id="publisher_address" value="<?php echo htmlspecialchars($form_data['publisher_address']); ?>">
            </div>
            <div class="form-group">
                <label for="publisher_email">Publisher Email</label>
                <input type="email" name="publisher_email" id="publisher_email" value="<?php echo htmlspecialchars($form_data['publisher_email']); ?>">
            </div>
            <div class="form-group">
                <label for="date_submitted">Date Submitted</label>
                <input type="text" name="date_submitted" id="date_submitted" value="<?php echo htmlspecialchars($form_data['date_submitted']); ?>">
            </div>
            <div class="form-group">
                <label for="publisher_telephone">Publisher Telephone</label>
                <input type="text" name="publisher_telephone" id="publisher_telephone" value="<?php echo htmlspecialchars($form_data['publisher_telephone']); ?>">
            </div>
            <div class="form-group">
                <label for="publication_date">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" value="<?php echo htmlspecialchars($form_data['publication_date']); ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="update_record">Update Record</button>
            </div>
        </form>
    </div>
</body>
</html>
