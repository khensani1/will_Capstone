<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'components/connect.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$form_id = $_POST['form_id'];
$language = $_POST['language'];
$title = $_POST['title'];
$province = $_POST['province'];
$race = $_POST['race'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address']; 
$addressOf = $_POST['addressOf']; 
$nameOfcurator = $_POST['nameOfcurator'];
$addressCurator = $_POST['addressCurator'];
$schedule_meeting = $_POST['schedule_meeting'];
$start_date = $_POST['start_date'];
$metropolitan = $_POST['metropolitan'];
$publisher_name = $_POST['publisher_name'];
$publisher_address = $_POST['publisher_address'];
$publisher_email = $_POST['publisher_email'];
$date_submitted = $_POST['date_submitted'];
$publisher_telephone = $_POST['publisher_telephone'];
$publication_date = $_POST['publication_date'];



$stmt = $conn->prepare("INSERT INTO form (language, title, province, race, first_name, last_name, address,addressOf, nameOfcurator, addressCurator, schedule_meeting, start_date, metropolitan, publisher_name, publisher_address, publisher_email, date_submitted, publisher_telephone, publication_date) VALUES (? ,? ,? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssssss", $language, $title, $province, $race, $first_name, $last_name, $address,$addressOf, $nameOfcurator, $addressCurator, $schedule_meeting, $start_date, $metropolitan, $publisher_name, $publisher_address, $publisher_email, $date_submitted, $publisher_telephone, $publication_date,);

// Execute the statement
if ($stmt->execute()) {
    // Get the last inserted form_id
    $form_id = $conn->insert_id;

    // Prepare and execute the second insert for the 'documents' table
    $stmt2 = $conn->prepare("INSERT INTO documents (title, province, first_name, last_name, address, start_date, metropolitan, publisher_address, date_submitted, publication_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt2->bind_param("ssssssssss", $title, $province, $first_name, $last_name, $address, $start_date, $metropolitan, $publisher_address, $date_submitted, $publication_date);
    
    if ($stmt2->execute()) {
        // Redirect to notice.php with the form_id in the URL
        header("Location: client_dashboard.php?form_id=" . $form_id);
        exit(); // Stop further script execution
    } else {
        echo "Error inserting into documents: " . $stmt2->error;
    }
} else {
    echo "Error inserting into form: " . $stmt1->error;
}

// Close the statement and connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>
