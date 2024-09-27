<?php

include 'components/connect.php';
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Output buffering to prevent premature output
ob_start();

// Function to log messages to a file
function logMessage($message) {
    $logFile = '/opt/lampp/htdocs/will_Capstone/logs.log';
    $timestamp = date('Y-m-d H:i:s');
    $formattedMessage = "[{$timestamp}] {$message}\n";
    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}

// Include the TCPDF library
require_once('/opt/lampp/htdocs/will_Capstone/vendor/tecnickcom/tcpdf/tcpdf.php');

// Check if form_id is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_id']) && !empty($_POST['form_id'])) {
    $form_id = $_POST['form_id'];
} elseif (isset($_GET['form_id']) && !empty($_GET['form_id'])) {
    // Check if form_id is passed as a query parameter
    $form_id = $_GET['form_id'];
} else {
    // If no form_id is provided, prompt user for form_id
    echo "<form method='POST' action=''>
            <label for='form_id'>Enter Form ID:</label>
            <input type='text' name='form_id' id='form_id' required>
            <button type='submit'>Submit</button>
          </form>";
    ob_end_flush(); // Flush the output buffer to display the form
    exit(); // Stop script execution until form is submitted
}

try {
    // Prepare SQL statement
    $sql = "SELECT * FROM form WHERE form_id = :form_id";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bindValue(':form_id', $form_id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if a form with the provided form_id exists
    if ($stmt->rowCount() == 0) {
        logMessage("Invalid Form ID provided: " . $form_id);
        die("<script>alert('Invalid Form ID. Please enter a valid one.'); window.history.back();</script>");
    }

    $form_data = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    logMessage("Database error: " . $e->getMessage());
    die("Database error: " . $e->getMessage());
}

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
$pdf->SetHeaderData('', 0, 'Notice', '');
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

// Provincial separator content
$provinceSeparator = "<div class='center' style='border-bottom: 2px solid #000; padding-bottom: 5px; margin-top: 5px; text-align: center;'>
                        <h2 style='margin: 0;'>Province: $province</h2>
                      </div>";

// Construct notice message with the provided format
$notice = "
<div style='text-align: center; margin-bottom: 5px;'>
    <h2 style='margin-left:40px;'>NOTICE OF SUBMISSION</h2>
    <h3 style='margin: 0;'>Form ID: $form_id</h3>
</div>

$provinceSeparator

<p class='indentation' style='text-align: center;'>In accordance with the relevant regulations, this notice serves to inform all parties 
concerned that the following details have been officially submitted. This documentation includes essential 
information regarding the individual and their submission details.</p>

<p class='indentation' style='text-align: center;'>The information is presented in the following order: (1) Language: $language; 
(2) Title: $title; (3) Province: $province; (4) Race: $race; (5) First Name: $first_name; 
(6) Last Name: $last_name; (7) Address: $address; (8) Address Of: $addressOf; (9) Name Of Curator: 
$nameOfcurator; (10) Address Of Curator: $addressCurator; (11) Schedule Meeting: $schedule_meeting; 
(12) Start Date: $start_date; (13) Metropolitan: $metropolitan; (14) Publisher Name: 
$publisher_name; (15) Publisher Address: $publisher_address; (16) Publisher Email: $publisher_email; 
(17) Date Submitted: $date_submitted; (18) Publisher Telephone: $publisher_telephone; 
(19) Publication Date: $publication_date.</p>

<p class='indentation' style='text-align: center;'>This notice is issued to ensure all relevant stakeholders are informed of 
the details related to this submission, and to facilitate any necessary follow-up actions.</p>

<p class='indentation' style='text-align: center;'><strong>Translated Notice:</strong> In ooreenstemming met die relevante regulasies 
word hierdie kennisgewing gegee om alle betrokke partye in te lig dat die volgende besonderhede 
amptelik ingedien is. Hierdie dokumentasie sluit essensiële inligting in rakende die individu 
en hul indieningsbesonderhede.</p>
";

// HTML content for the PDF
$pdf->writeHTML($notice, true, false, true, false, '');

// Path to save the PDF file
$filePath = '/opt/lampp/htdocs/will_Capstone/form_submission.pdf';

$pdf->Output($filePath, 'F');

// Log success
logMessage("PDF saved successfully at: " . $filePath);

// Clean the output buffer
ob_end_clean();

// Display the preview and download option
echo "<h2>PDF Generated Successfully</h2>";
echo "<p><a href='/will_Capstone/form_submission.pdf' target='_blank'>Preview PDF</a></p>";
echo "<p><a href='/will_Capstone/form_submission.pdf' download='form_submission.pdf'>Download PDF</a></p>";
