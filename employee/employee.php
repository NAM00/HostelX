<?php
session_start();
session_start();
$uName =($_SESSION['username']);
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}

  include "includes/db_connect.inc.php";

   $uName = $uPass   = $uNameInDB = "" ;
	$uName =($_SESSION['username']);
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['pastb'])){
      $uPass = mysqli_real_escape_string($conn, $_POST['pastb']);
      $uPassToDB = password_hash($uPass, PASSWORD_DEFAULT);
      $sql = "UPDATE LOGIN SET pass='$uPassToDB' where id='$uName';";

       if(mysqli_query($conn, $sql))
       {
        echo "<script type='text/javascript'>alert('Password Changed');</script>";
       }

    }
  }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

 
  });
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>HostelX</title>
    <link rel="stylesheet" href="../admin/css/adminstyle.css">



});
 
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1 class="logo"><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
          <li class="current"><a href="employee.php">Home</a></li>
          <li><a href="m_student.php">Manage Tenant</a></li>
          <li><a href="application.php"> Application</a></li>
          <li><a href="complaints.php"> Complaints</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
  <section id="showcase">
    <div id="backgroundimage">
    <img src="../img/hostel.jpg" width="100%" height="650px";>
    </div>
   <div class="container">
     <h1>Welcome  HostelSuper </h1>
     <form action="employee.php" method="post">

<input type="text" class="textareaL" placeholder="enter new password"name="pastb" value=""
><button type="submit" class="btnN" name="s1">Submit</button> </td>

</form>
   </div>
  </section>
 

  </section>
  <footer>
    <p>Hostel Management, Copyright &copy; 2020</p>
  </footer>
  </body>
</html>
