<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publications";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form_id is set in the query string
if (isset($_GET['form_id'])) {
    $form_id = $_GET['form_id'];

    // Prepare the SQL statement to fetch data based on form_id
        // Fetch form data based on form_id
        $sql = "SELECT * FROM form WHERE form_id = ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $form_id);
        $stmt->execute();
        

    // Fetch the result
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Fetch the data as an associative array and display the content
        $row = $result->fetch_assoc();
        
        // Generate the newsletter content
     echo '
     <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Newsletter</title>
<style>

body {
            font-family: Arial,sans-serif;
            margin:auto;
            padding: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: white; 
            font-size: 12px;
            
      }
          
          
  .A4-page {
            width: 210mm;
            height: 297mm ;
            background-color: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            box-sizing: border-box;

         }
         
    
h1{
font-size: 22px;
font-weight:200;
}
h2{
font-size: 18px;

}
p{
text-align: 1.5px;
font-size:16px;
font-weight: 100;
word-spacing:5px;

}
.long-line{
width: 100%;
height: 1px;
background-color:#000;
position : relative;
transform:tranlateX(-100%) tranlateY(-100%);
margin-top:-30px;

}
.long-line2{
width: 105%;
height: 1px;
background-color:#000;
position : relative;
transform:tranlateX(-100%) tranlateY(-100%);
margin-top:-10px;
margin-left:-20px;
}
.short-line{
width: 48%;
height: 1px;
background-color:#000;
position : relative;
transform:tranlateX(-50%);
margin-top:-1px;
}
.short-line2{
width: 48%;
height: 1px;
background-color:#000;
position : relative;
margin-top:-10px;
margin-bottom:1px;
}
.highlight{
background-color:#EDEDED;
padding:5px;
}
.center{
text-align: center;
}
.left{
text-align: left;
font-size: 16px;
}

.centered-text {
    text-align: center;
}
.header-number {
    float: right;
}
.indentation{
text-indent: 20px;

          }
a{
text-decoration:none;
color:#333;

}


</style>
     <title>A4 Document</title>
</head>

<body>
<div class="A4Page">
    
<blockquote>
<header>
 <p class="h4 centered-text">
     ' . htmlspecialchars($row['publication_date']) . '
         <div class="center"><h1 ><hr class="short-line2">' . htmlspecialchars($row['province']) . '<hr class="short-line"></h1></div>
    
 <p class="indentation">16852255/2025-Executor (2) <b>' . htmlspecialchars($row['title']) . ' ' . htmlspecialchars($row['last_name']) . ',' . htmlspecialchars($row['first_name']) . '</b>: (3)' . htmlspecialchars($row['title']) . '  ' . htmlspecialchars($row['address']) . '; (4)  ' . htmlspecialchars($row['start_date']) . '; (5) MASTER OF THE HIGH COURT ' . htmlspecialchars($row['metropolitan']) . ' ' . htmlspecialchars($row['publisher_address']) . ' 2ND   FLOOR DEPUTY MASTER OFFICE ' . htmlspecialchars($row['date_submitted']) . ', 10:00.<br>
<span class="indentation">&nbsp;&nbsp;16852255/2025-Executor (2) <b>' . htmlspecialchars($row['title']) . ' ' . htmlspecialchars($row['last_name']) . ',' . htmlspecialchars($row['first_name']) . '</b>: (3) ' . htmlspecialchars($row['address']) . ', PENSIONER; (4) ' . htmlspecialchars($row['start_date']) . ' (5) MASTER OF THE HIGH COURT ' . htmlspecialchars($row['metropolitan']) . ' ' . htmlspecialchars($row['publisher_address']) . ' 2ND FLOOR DEPUTY MASTER OFFICE ' . htmlspecialchars($row['date_submitted']) . ', 10:00.</span></p> 

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
 of van die beïndiging van  aanstellings sodanige  ' . htmlspecialchars($row['schedule_meeting']) . ' .</p>
 <p class="indentation">Die inligting word versterek in die volgorde: (1) Nommer van saak;
  (2) person onder kurantele, of minderjarige, en adres;  (3) kurator of voog; naam en adres van kurator of
   voog; (4) of aanstelling of beeindiging daarvan, en datum; 
  (5) Meester van die Hooggeregshof.</p>


<div class="center"><br><br><br><span class="highlight">This gazette is also available free online <a href="https://www.gpw.gov.za/"><u>www.gpwonline.co.za</u> </span>
 </div></a>
            
        </blockquote>
   
  
</body>

</html>
     </body>
     </html>';
        
    } else {
        echo "No data found for this form ID.";
    }

    // Close the statement and connection
    $stmt->close();
} else {
    echo "Form ID is missing.";
}

$conn->close();
?>
