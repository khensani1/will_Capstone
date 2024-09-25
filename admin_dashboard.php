<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
<link rel="stylesheet" href="styles.css">

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <!--- <a href="#">Dashboard</a> -->
       <h1>&nbsp;&nbsp;&nbsp;Dashboard</h1>
       <a href="profile.html"><img src="images/user.svg" alt="Admin SVG" class="resize">&nbsp;&nbsp;Profile</a>
        <a href="#"><img src="images/view.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;View Form</a>
       <!--<a href="form.html"><img src="C:\Users\User\Desktop\Ice_project\create.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Create Notice</a> -->
        <a href="#"><img src="images/update.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Update Form</a>
        <a href="#"><img src="images/delete.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Delete Form</a>
        <a href="Landing_page.html"><img src="images/off.svg" alt="Description of the SVG" class="resize">&nbsp;&nbsp;Logout</a>
    </div>

    <!-- Main content area -->
    <div class="main-content">

        <!-- Navbar -->
        <div class="navbar">
            <h1>Document Management System</h1>



           <h1> <img src="images/Admin.svg" alt="Description of the SVG" class="resize">Administrator<h1>
        </div>
      <br>
        <!-- Content area -->
        <div class="content">
            <div class="card">
        
              <!--  <button type="submit">CREATE</button> -->
              <!--<button class="metallic-button" type="button" onclick="window.location.href='form.html'">Create</button> -->
        
              <div class="grid-container">
                <!--<div class="grid-item"><button class="metallic-button" type="submit"></button></div> -->
                <div class="grid-item"><button class="metallic-button" type="submit" onclick="window.location.href='delete_user.php'">Delete User</button></div>
                <div class="grid-item"><button class="metallic-button" type="submit" onclick="window.location.href='view_user.php'">View Users</button></div>
              <!-- <div class="grid-item"><button class="metallic-button" type="submit">Statistics</button></div>
               <!--<div class="grid-item"><button class="metallic-button" type="submit">Reset User Password</button></div>-->
              <!--<div class="grid-item"><button class="metallic-button" type="submit">Processing</button></div> -->


                </div>


            </div>
  
            <div class="card">
                <h2>View Document(s)</h2>
                <button class="metallic-button" type="button" onclick="window.location.href='view_submission.php'">VIEW</button>
            </div>

            <div class="card">
                <h2>Update Form</h2>

                <button class="metallic-button" type="button" onclick="window.location.href='update_form.php'">Update Form</button>


            </div>
             
            <div class="card">
                <h2>Delete Form</h2>
                <button class="metallic-button"type="submit" onclick="window.location.href='delete_form.php'">Delete</button>
            </div>
			<div class="card">
                <h2>Delete User</h2>
                <button class="metallic-button"type="button" onclick="window.location.href='delete_user.php'">Delete</button>
            </div>
            <div class="stats_card">

                
                <h1>STATISTICS</h1> 
                <div class="chart">
                   <!--<div class="bar" style="height: 10%; background-color: #4CAF50;" title="10%"></div>-->
                    <div class="bar" style="height: 60%; background-color: #2196F3;" title="60%"></div>
                    <div class="bar-label">Printed Forms</div>
                   <!--<div class="bar" style="height: 40%; background-color: #f44336;" title="40%"></div> -->
                    <div class="bar" style="height: 20%; background-color: #FF9800;" title="20%"></div>
                    <div class="bar-label">Users</div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>