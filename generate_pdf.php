<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Output buffering to prevent premature output
ob_start();

// Function to log messages to a file
function logMessage($message) {
    $logFile = '/opt/lampp/htdocs/will/logs.log';
    $timestamp = date('Y-m-d H:i:s');
    $formattedMessage = "[{$timestamp}] {$message}\n";
    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}

// Include the TCPDF library
require_once('/opt/lampp/htdocs/will/vendor/tecnickcom/tcpdf/tcpdf.php');

// Database connection
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "publications";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    logMessage("Connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

// Check if form_id is passed as a query parameter
if (!isset($_GET['form_id']) || empty($_GET['form_id'])) {
    logMessage("No Form ID provided.");
    die("<script>alert('No Form ID provided.'); window.history.back();</script>");
}

$form_id = $_GET['form_id'];

// Prepare SQL statement
$sql = "SELECT * FROM form WHERE form_id = ?";
$stmt = $conn->prepare($sql);

// Check if preparation was successful
if ($stmt === false) {
    logMessage("Failed to prepare SQL statement: " . $conn->error);
    die("Failed to prepare SQL statement: " . $conn->error);
}

// Bind parameters and execute the statement
$stmt->bind_param("i", $form_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if a form with the provided form_id exists
if ($result->num_rows == 0) {
    logMessage("Invalid Form ID provided: " . $form_id);
    die("<script>alert('Invalid Form ID. Please enter a valid one.'); window.history.back();</script>");
}

$form_data = $result->fetch_assoc();

// Assign form data to variables
$language = $form_data['language'] ?? 'N/A';
$title = $form_data['title'] ?? 'N/A';
$province = $form_data['province'] ?? 'N/A';
$race = $form_data['race'] ?? 'N/A';
$first_name = $form_data['first_name'] ?? 'N/A';
$last_name = $form_data['last_name'] ?? 'N/A';
$address = $form_data['address'] ?? 'N/A';
$addressOf = $form_data['addressOf'] ?? 'N/A';
$nameOfcurator = $form_data['nameOfcurator'] ?? 'N/A';
$addressCurator = $form_data['addressCurator'] ?? 'N/A';
$schedule_meeting = $form_data['schedule_meeting'] ?? 'N/A';
$start_date = $form_data['start_date'] ?? 'N/A';
$metropolitan = $form_data['metropolitan'] ?? 'N/A';
$publisher_name = $form_data['publisher_name'] ?? 'N/A';
$publisher_address = $form_data['publisher_address'] ?? 'N/A';
$publisher_email = $form_data['publisher_email'] ?? 'N/A';
$date_submitted = $form_data['date_submitted'] ?? 'N/A';
$publisher_telephone = $form_data['publisher_telephone'] ?? 'N/A';
$publication_date = $form_data['publication_date'] ?? 'N/A';
$user_id = $form_data['user_id'] ?? 'N/A';

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('WILL');
$pdf->SetTitle('Notice Form PDF');
$pdf->SetSubject('Generated PDF from Form');
$pdf->SetKeywords('PDF, form, document');

// Set default header and footer
$pdf->SetHeaderData('', 0, 'Form Data', '');
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set content
$html = "
<h1>Form Submission</h1>
<p><strong>Language:</strong> $language</p>
<p><strong>Title:</strong> $title</p>
<p><strong>Province:</strong> $province</p>
<p><strong>Race:</strong> $race</p>
<p><strong>First Name:</strong> $first_name</p>
<p><strong>Last Name:</strong> $last_name</p>
<p><strong>Address:</strong> $address</p>
<p><strong>Address Of:</strong> $addressOf</p>
<p><strong>Name Of curator:</strong> $nameOfcurator</p>
<p><strong>Address Of Curator:</strong> $addressCurator</p>
<p><strong>Schedule meeting:</strong> $schedule_meeting</p>
<p><strong>Start date:</strong> $start_date</p>
<p><strong>Metropolitan:</strong> $metropolitan</p>
<p><strong>Publisher name:</strong> $publisher_name</p>
<p><strong>Publisher email:</strong> $publisher_email</p>
<p><strong>Publisher address:</strong> $publisher_address</p>
<p><strong>Date submitted:</strong> $date_submitted</p>
<p><strong>Publisher telephone:</strong> $publisher_telephone</p>
<p><strong>Publication date:</strong> $publication_date</p>
<p><strong>User ID:</strong> $user_id</p>
";

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Define the path to save the PDF file
$filePath = '/opt/lampp/htdocs/will/form_submission.pdf';

// Save the PDF file
$pdf->Output($filePath, 'F');

// Log successful PDF generation
logMessage("PDF saved successfully at: " . $filePath);

// Clean the output buffer
ob_end_clean();
// Display the preview and download option
echo "<h2>PDF Generated Successfully</h2>";
echo "<p><a href='/will/form_submission.pdf' target='_blank'>Preview PDF</a></p>";
echo "<p><a href='/will/form_submission.pdf' download='form_submission.pdf'>Download PDF</a></p>";
?>
