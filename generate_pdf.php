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

// Prepare the HTML content for the PDF
$html = '
<body>
<div class="A4Page">
<blockquote>
<header>
 <p class="h4 centered-text">
     ' . htmlspecialchars($form_data['publication_date']) . '
         <div class="center"><h1 ><hr class="short-line2">' . htmlspecialchars($form_data['province']) . '<hr class="short-line"></h1></div>
    
 <p class="indentation">16852255/2025-Executor (2) <b>' . htmlspecialchars($form_data['title']) . ' ' . htmlspecialchars($form_data['last_name']) . ',' . htmlspecialchars($form_data['first_name']) . '</b>: (3)' . htmlspecialchars($form_data['title']) . '  ' . htmlspecialchars($form_data['address']) . '; (4)  ' . htmlspecialchars($form_data['start_date']) . '; (5) MASTER OF THE HIGH COURT ' . htmlspecialchars($form_data['metropolitan']) . ' ' . htmlspecialchars($form_data['publisher_address']) . ' 2ND   FLOOR DEPUTY MASTER OFFICE ' . htmlspecialchars($form_data['date_submitted']) . ', 10:00.<br>
<span class="indentation">&nbsp;&nbsp;16852255/2025-Executor (2) <b>' . htmlspecialchars($form_data['title']) . ' ' . htmlspecialchars($form_data['last_name']) . ',' . htmlspecialchars($form_data['first_name']) . '</b>: (3) ' . htmlspecialchars($form_data['address']) . ', PENSIONER; (4) ' . htmlspecialchars($form_data['start_date']) . ' (5) MASTER OF THE HIGH COURT ' . htmlspecialchars($form_data['metropolitan']) . ' ' . htmlspecialchars($form_data['publisher_address']) . ' 2ND FLOOR DEPUTY MASTER OFFICE ' . htmlspecialchars($form_data['date_submitted']) . ', 10:00.</span></p> 

 <hr class="long-line">

<div class="left">&nbsp;&nbsp;<b>Form/Vorm K25</b><div>

<div class="center"><h2>NOTICE OF CURATOR AND TUTOR</h2></div>

<p class="indentation">In terms of section 75 of the Administration of Estates Act No. 66 of 1965 (as amended),
 notice is hereby given of appointments by Masters as Curators or Tutors by Masters of the High Court, or of 
 termination of such appointments (other than having ceased in their respective capacity) </p> 
 <p class="indentation">The information is given in the following order: (1) Number of matter;(2)person 
 under curatorship, or minor,and address; (3) curator or tutor;name and address of curator or tutor ;(4) 
 whether appointment or termination (cease in capacity), and date; (5) Master of the High Court.<span></p>

 <div class="center"><h2 >KENNISGEWINGS VAN KURATORS EN VOOGDE</h2></div>
<p class="indentation">Ingevolge Artikel 75 van die Boedelwet No. 66 van 1965 (soos gewysig),
 word hierby kennis gegee van die aanstelling van persone as kurators of voogde deur die Meesters van die Hoe Hof, 
 of van die beïndiging van aanstellings sodanige  ' . htmlspecialchars($form_data['schedule_meeting']) . ' .</p>
 <p class="indentation">Die inligting word verstrek in die volgorde: (1) Nommer van saak;
  (2) person onder kurantele, of minderjarige, en adres;  (3) kurator of voog; naam en adres van kurator of
   voog; (4) of aanstelling of beeindiging daarvan, en datum; 
  (5) Meester van die Hooggeregshof.</p>

<div class="center"><br><br><br><span class="highlight">This gazette is also available free online <a href="https://www.gpw.gov.za/"><u>www.gpwonline.co.za</u></span>
 </div></a>
</body>';

// Output the HTML content into the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Save the PDF to a file
$file_name = '/opt/lampp/htdocs/will_Capstone/form_submission.pdf';
$pdf->Output($file_name, 'F'); // 'F' to save to file

// Output success message and download/preview links
echo "<h2>PDF Generated Successfully</h2>";
echo "<p><a href='/will_Capstone/form_submission.pdf' target='_blank'>Preview PDF</a></p>";
echo "<p><a href='/will_Capstone/form_submission.pdf' download='form_submission.pdf'>Download PDF</a></p>";

ob_end_flush();
?>
