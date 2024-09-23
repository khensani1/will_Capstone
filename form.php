<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Form</title>
    <style>
body {
    font-family: Arial, sans-serif;
}
.A4-page {
            width: 210mm;
            height: 297mm ;
            background-color: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            box-sizing: border-box;

         }
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #000;
}
.header {
    text-align: center;
    margin-bottom: 20px;
}
.form-group {
    margin-bottom: 15px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    box-sizing: border-box;
}
.checkbox-group {
    display: flex;
    justify-content: space-between;
}
.checkbox-group label {
    flex: 1;
    margin-right: 10px;
}
.checkbox-group input {
    margin-right: 5px;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
}
.toTheRight{
    text-align: right;
}
.centered{
    text-align: center;
}
hr.bold {
    border: none;
    border-top: 10px solid black;
    color: black;
}
input, textarea {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}


.custom-input {
            width: 150px; /* Adjust width to make it smaller */
            background-color: lightblue; /* Light blue background */
            border: 2px solid red; /* Red border around the field */
        }

button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}</style>
</head>
<body>
<p class="h4 centered-text">
    <form action="submit_form.php" method="POST">
    <div class="A4Page"> 
            <div class="header">
                
            </div>
            <h3 class="toTheRight">Form J295</h3>
            <div class="centered">
                <img src="images/images.jpeg" alt="Description of the image">
            </div>
            <h3 class="centered">NOTICE OF CURATOR AND TUTOR</h3>
            in terms of section 75 of the Administration of Estates Act, No. 66 of 1965 (as amended), notice is hereby given of 
            appointment of a person as Curator or Tutor by Masters of the High Court, or of termination of such appointment.
            <hr> 
            </select>

            *Notice Language:
            Taal van kennisgewing:
            
            <label for="language">
                <input type="checkbox" id="language" name="language" value="English">
                English
            </label>
            <label for="noticeLang">
                <input type="checkbox" id="language" name="language" value="Afrikaans">
                Afrikaans
            </label><br>
            
                <label for="title">*Estate Number/Boedelnommer:</label>
                <input type="text" id="title" name="title" class="custom-input">
            <br>
            <label for="dropdown">*Province/Provinsie:</label>
            <select name="province" id="province">
                <option value="select">select----</option>
                <option value="Limpopo">Limpopo</option>
                <option value="Gauteng">Gauteng</option>
                <option value="Mpumalanga">Mpumalanga</option>
                <option value="Free State">Free State</option>
                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                <option value="Northern Cape">Northern Cape</option>
                <option value="Western Cape">Western Cape</option>
                <option value="Eastern Cape">Eastern Cape</option>
                <option value="North West">North West</option>
            </select>
            <br>
            *Person:
            <label for="race">Curatorship</label>
            <input type="checkbox" id="race" name="race" value="Curatorship">
            <label for="race">Minor</label>
            <input type="checkbox" id="race" name="race" value="Minor"><br>
            
            
                <label for="first_name">*First Names/Voorname:</label>
                <input type="text" id="first_name" name="first_name" style="background-color: lightblue; border: 2px solid red;">
            <br>
            
                <label for="last_name">*Surname / Van:</label>
                <input type="text" id="last_name" name="last_name" style="background-color: lightblue; border: 2px solid red;">
                <br>
                <label for="address">*Address/Adres:</label>
                <input type="text" id="address" name="address" style="background-color: lightblue; border: 2px solid red;">
                <br>
            *Name and address of:<br> Naam en adres van:
            <label for="addressCurator">
                <input type="checkbox" id="addressCurator" name="addressOf" value="Curator" class="custom-input">
                Curator/Kurator
            </label>
            <label for="addressTutor">
                <input type="checkbox" id="addressTutor" name="addressOf" value="Tutor" class="custom-input">
                Tutor/Voog
            </label>
            <br>
            <label for="nameOfcurator">Name of Curator or Tutor/Adres van Kurator of Voog:</label>
            <input type="text" id="nameOfcurator" name="nameOfcurator" style="background-color: lightblue; border: 2px solid red;"><br>
            <br>
            <label for="addressCurator">Address of Curator or Tutor/Adres van Kurator of Voog:</label>
            <input type="text" id="addressCurator" name="addressCurator" style="background-color: lightblue; border: 2px solid red;"><br>
            <br>
                *Whether of -
                <label for="schedule_meeting">
                    <input type="checkbox" id="checkbox1" name="schedule_meeting" value="Appointment">
                    Appointment OR <br>Aanstelling OF
                </label>
                
                <label for="schedule_meeting">
                    <input type="checkbox" id="checkbox2" name="schedule_meeting" value="Termination">
                    Termination<br>Beeindiging (select the applicable check box)
                </label>
            
                <br>
                <label>*As from date/Vanaf datum</label>
                <input type="date" name="start_date" class="custom-input">
                <br>
                <label for="metropolitan">*Master of  the High Court/Meester van die Hooggeregshof:</label>
                <input type="text" id="metropolitan" name="metropolitan" style="background-color: lightblue; border: 2px solid red;">
                <br>
            <hr>
                <label for="publisher_name">*Advertiser Name:</label>
                <input type="text" id="publisher_name" name="publisher_name" style="background-color: lightblue; border: 2px solid red;">
                <br>
                <label for="publisher_address">Advertiser Address:</label>
                <input type="text" id="publisher_address" name="publisher_address" style="background-color: lightblue; border: 2px solid red;">
                <br>
                <label for="publisher_email">Advertiser Email:</label>
                <input type="email" id="publisher_email" name="publisher_email" style=" background-color: lightblue; border: 2px solid red;">
                <br>
                <label>*Date Submitted:</label>
                <input type="date" name="date_submitted" class="custom-input">
                
                <label for="publisher_telephone">Advertiser Telephone:</label>
                <input type="tel" id="publisher_telephone" name="publisher_telephone" class="custom-input">
                <br>
                <label>*For Publication in the Government Gazette on / Vir Publikasie in die Staatskoerant op:</label>
                <input type="date" name="publication_date" class="custom-input">
            

            
            <hr>
            <p style="color: red;">#Language chosen will be used for formatting of date fields and standing text. It does not imply that the notice content will be translated.

<br>Die taal hier gekies, word slegs gebruik om datum formaat en staande teks te bepaal. Dit impliseer nie vertaling van gegewe teks nie.
</p>
            
            <p style="color: gray;">DEPARTMENT OF JUSTICE AND CONSTITUTIONAL DEVELOPMENT</p>


            <div class="button">
                <button type="submit">Submit</button>
                
            </div>
        </div>
        </div>
    </form>
</body>
</html>
