<?php 
session_start();

if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
//unset(($_SESSION['username']));

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>HostelX</title>
  <link rel="stylesheet" href="./css/adminstyle.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1 class="logo"><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
          <li class="current"><a href="admin.php">Home</a></li>
          <li><a href="m_employee.php">Manage Employee</a></li>
          <li><a href="m_student.php">Manage Tenant</a></li>
          <li><a href="application.php"> Application</a></li>
          <li><a href="complaints.php"> Complaints</a></li>
          <li><a href="m_admin.php">Manage Admin</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
  <section id="showcase">
    <div id="backgroundimage">
    <img src="../img/hostel.jpg" width="100%" height="750px";>
    </div>
   <div class="container">
     <h1>Welcome  ADMIN</h1>
   </div>
  </section>


  <footer>
    <p>Hostel Management, Copyright &copy; 2020</p>
  </footer>
  </body>
</html>
