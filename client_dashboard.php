<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
 <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <!--- <a href="#">Dashboard</a> -->
       <h1>&nbsp;&nbsp;&nbsp;Dashboard</h1>
     <a href="#"><img src="images/user.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Profile</a>
    <!-- <a href="#"><img src="C:\Users\User\Desktop\Ice_project\tools.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Key Metrics</a> -->
      <!-- <a href="#"><img src="C:\Users\User\Desktop\Ice_project\view.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;View Users</a>-->
        <a href="form.php"><img src="images/create.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Create Form</a>
        <a href="view_submission.php"><img src="images/view.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;View Form</a>
      
        <a href="login.php"><img src="images/off.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Logout</a>
    </div>

    <!-- Main content area -->
    <div class="main-content">

        <!-- Navbar -->
        <div class="navbar">
            <h1>Document Management System</h1>
<h1><img src="images/user.svg" alt="Description of the SVG" class="resize">Client<h1>
        </div>
      <br>
        <!-- Content area -->
        <div class="content">
          


            </div>
            
            <div class="card">
                <h2>Fill Form</h2>
              <!--  <button type="submit">CREATE</button> -->
              <button class="metallic-button" type="button" onclick="window.location.href='form.php'">Create Form</button>
            </div>
            
            <div class="card">
                <h2>View Form</h2>
              <!--  <button type="submit">CREATE</button> -->
              <button class="metallic-button" type="button" onclick="window.location.href='form.php'">View Form</button>
            </div>
            <div class="card">
                <h2>create Pdf</h2>
              <!--  <button type="submit">CREATE</button> -->
              <button class="metallic-button" type="button" onclick="window.location.href='form.php'">Generate pdf</button>
            </div>
           

        </div>

    </div>

</body>
</html>