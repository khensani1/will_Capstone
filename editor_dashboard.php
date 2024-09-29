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
        <a href="view_submission.php"><img src="images/view.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;View Form</a>
        <a href="update_form.php"><img src="images/update.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Update Form</a>
        <a href="Landing_page.html"><img src="images/off.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Logout</a>
    </div>

    <!-- Main content area -->
    <div class="main-content">

        <!-- Navbar -->
        <div class="navbar">
            <h1>Document Management System</h1>
            <h1> <img src="images/Editor.svg" alt="Description of the SVG" class="resize">Editor<h1>
        </div>
      <br>
        <!-- Content area -->
        <div class="content">
           
           <!-- <div class="card">
                <h2>Search Users</h2>
              <!--  <button type="submit">CREATE</button> -->
            
              <!-- <button class="metallic-button" type="button" onclick="window.location.href='form.html'">Create</button> -->
            <!--  <input type="text" class="search-input" placeholder="Search...">
              <button class="search-button">🔍</button> -->
            <!-- </div> -->
        
            <div class="card">
                <h2>View Form</h2>
                <button class="metallic-button" type="submit" onclick="window.location.href='view_submission.php'">VIEW</button>
            </div>
        
            <div class="card">
                <h2>Update Form</h2>
                <button class="metallic-button" type="submit" onclick="window.location.href='update_form.php'">Update</button>
            </div>

        </div>

    </div>

</body>
</html>