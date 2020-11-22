<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

session_start();
$uName =($_SESSION['username']);
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
include "includes/db_connect.inc.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['rfresh']))
  {
    unset($_POST['mbutton']);
    unset($_POST['btnL']);
    $sub=$body="";


  }
  if(isset($_POST['sbtn']))

  {
    if(!empty($_POST['sub'])){
      $sub = mysqli_real_escape_string($conn, $_POST['sub']);
    }
    if(!empty($_POST['body'])){
      $body = mysqli_real_escape_string($conn, $_POST['body']);
    }
    if((!empty($sub))&&(!empty($body)))
    {
      $sql = "INSERT INTO com (SUB,BODY,SEID) VALUES('$sub','$body','$uName' );";

       if(mysqli_query($conn, $sql))
       {
        echo "<script type='text/javascript'>alert('sent');</script>";
       }

    }
    else
    {
      echo "<script type='text/javascript'>alert('Fill each fields');</script>";
    }


  }
}
?>








<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="low budget hostel">
    <meta name="description" content="low budget hostel rent">
    <meta name="description" content="hostel">
    <title>HostelX</title>
    <link rel="stylesheet" href="../admin/css/adminstyle.css">
  <style>

    </style>
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1 class="logo"><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
        <li ><a href="student.php">Home</a></li>
          <li ><a href="s_comlication.php"> Application</a></li>
          <li class="current" ><a href="s_complaints.php"> Complains</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section align ="center" id="addemp">
         <div class="m_emp">
          <form action="s_complaints.php" method="post">
           <table>
             <th><h1>Complains</h1></th>
  
             <tr id="t">
               <td> <label>Subject: </label> </td>.
               <td> <input type="text" class="textareaN" name="sub" value="<?php echo $sub ?>"> </td>
             </tr>
             <tr id="t">
               <td> <label>Body</label> </td>
               <td> <input type="text" class="textareaM" name="body" value="<?php echo $body ?>"> </td>
             </tr>
           </table>
           <div id="m_empbtn">
           <button type="submit" class="btnN" name="sbtn" value="">Send</button>         </div>
         <div align="center">
           <button type="submit" class="btnL" name="rfresh">Refresh </button>
         </div>
         </div>
        </form>
      


     </section>


  </body>
</html>