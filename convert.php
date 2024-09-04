<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

$pdf = new FPDF();
$pdf->AddPage();

// Set the font for the document
$pdf->SetFont('Arial', 'B', 14);

// Form fields extraction
$language = isset($_POST['language']) ? $_POST['language'] : 'N/A';
$province = isset($_POST['province']) ? $_POST['province'] : 'N/A';
$person = isset($_POST['person']) ? $_POST['person'] : 'N/A';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : 'N/A';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : 'N/A';
$address = isset($_POST['address']) ? $_POST['address'] : 'N/A';
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : 'N/A';
$metropolitan = isset($_POST['metropolitan']) ? $_POST['metropolitan'] : 'N/A';
$publisher_name = isset($_POST['publisher_name']) ? $_POST['publisher_name'] : 'N/A';
$publisher_address = isset($_POST['publisher_address']) ? $_POST['publisher_address'] : 'N/A';
$publisher_email = isset($_POST['publisher_email']) ? $_POST['publisher_email'] : 'N/A';
$date_submitted = isset($_POST['date_submitted']) ? $_POST['date_submitted'] : 'N/A';
$publisher_telephone = isset($_POST['publisher_telephone']) ? $_POST['publisher_telephone'] : 'N/A';
$publication_date = isset($_POST['publication_date']) ? $_POST['publication_date'] : 'N/A';

// Add content to the PDF
$pdf->Cell(0, 10, 'Newspaper', 0, 1, 'C');
$pdf->Ln(10); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Form Language: ', 0, 0);
$pdf->Cell(0, 10, $language, 0, 1);

$pdf->Cell(50, 10, 'Province: ', 0, 0);
$pdf->Cell(0, 10, $province, 0, 1);

$pdf->Cell(50, 10, 'Title: ', 0, 0);
$pdf->Cell(0, 10, $person, 0, 1);

$pdf->Cell(50, 10, 'First Name: ', 0, 0);
$pdf->Cell(0, 10, $first_name, 0, 1);

$pdf->Cell(50, 10, 'Last Name: ', 0, 0);
$pdf->Cell(0, 10, $last_name, 0, 1);

$pdf->Cell(50, 10, 'Address: ', 0, 0);
$pdf->Cell(0, 10, $address, 0, 1);

$pdf->Cell(50, 10, 'Start Date: ', 0, 0);
$pdf->Cell(0, 10, $start_date, 0, 1);

$pdf->Cell(50, 10, 'MetroPolitan: ', 0, 0);
$pdf->Cell(0, 10, $metropolitan, 0, 1);

$pdf->Cell(50, 10, 'Publisher Name: ', 0, 0);
$pdf->Cell(0, 10, $publisher_name, 0, 1);

$pdf->Cell(50, 10, 'Publisher Address: ', 0, 0);
$pdf->Cell(0, 10, $publisher_address, 0, 1);

$pdf->Cell(50, 10, 'Publisher Email: ', 0, 0);
$pdf->Cell(0, 10, $publisher_email, 0, 1);

$pdf->Cell(50, 10, 'Date Submitted: ', 0, 0);
$pdf->Cell(0, 10, $date_submitted, 0, 1);

$pdf->Cell(50, 10, 'Publisher Telephone: ', 0, 0);
$pdf->Cell(0, 10, $publisher_telephone, 0, 1);

$pdf->Cell(50, 10, 'Publication Date: ', 0, 0);
$pdf->Cell(0, 10, $publication_date, 0, 1);

// Output the PDF (to download or browser)
$pdf->Output('Download', 'Newspaper.pdf'); 
?>
