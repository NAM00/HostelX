
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

session_start();
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
include "includes/db_connect.inc.php";

$body=$sub=$aid=$seid=$eaddrs=$message=$inpass=$sqla=$resulta =$rowCounta = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['rfresh']))
  {
    unset($_POST['mbutton']);
    unset($_POST['btnL']);
    $body=$sub=$aid=$seid=$eaddrs="";


  }
  if(isset($_POST['va']))
  {
    $sqla = "SELECT aid, sub, seid FROM app";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['va']);
  }
  if(isset($_POST['s1']))
  {
    if(!empty($_POST['sidtb'])){
      $sid = mysqli_real_escape_string($conn, $_POST['sidtb']);
    }
    $sqla = "SELECT aid, sub, seid FROM app where aid='$sid'";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['s1']);
  }
  if(isset($_POST['s2']))
  {
    if(!empty($_POST['ridtb'])){
      $rid = mysqli_real_escape_string($conn, $_POST['ridtb']);
    }
    $sqla = "SELECT aid, sub, seid FROM app where seid='$rid'";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['s2']);
  }
  switch ($_POST['mbutton'])
   {

    case 'load':
      if(!empty($_POST['aid'])){
        $aid = mysqli_real_escape_string($conn, $_POST['aid']);
        $sql = "SELECT * FROM app WHERE aid = '$aid'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount < 1){
          $message = "application does not exist!";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }else{
          while($row = mysqli_fetch_assoc($result)){
            $sub=$row['sub'];
            $body=$row['body'];
            $seid=$row['seid'];
            $aid=$row['aid'];
          
            
          }
          unset($_POST['load']);
        }


      }
      else{
        echo "<script type='text/javascript'>alert('Enter application id');</script>";

      }

      unset($_POST['mbutton']);
    break;
    default:
    unset($_POST['mbutton']);
    $esal=$body=$sub=$aid=$seid=$eaddrs="";
    break;



      
  
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
          <li><a href="admin.php">Home</a></li>
          <li ><a href="m_student.php">Manage Tenant</a></li>
          <li class="current"><a href="application.php"> Application</a></li>
          <li><a href="complaints.php"> Complaints</a></li>
          <li><a href="m_admin.php">Manage Rent</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section align ="center" id="addemp">
         <div class="m_emp">
          <form action="application.php" method="post">
           <table>
             <th><h1>Applications</h1></th>
             <tr id="t">
               <td> <label>Application ID:</label> </td>
               <td> <input type="text" class="textareaN" name="aid" value="<?php echo $aid ?>"> </td>
             </tr>
             <tr id="t">
               <td> <label>Subject: </label> </td>.
               <td> <input type="text" class="textareaN" name="sub" value="<?php echo $sub ?>"> </td>
             </tr>
             <tr id="t">
               <td> <label>Body</label> </td>
               <td> <input type="text" class="textareaM" name="body" value="<?php echo $body ?>"> </td>
             </tr>
             <tr id="t">
              <td> <label>Sent by</label> </td>
              <td> <input type="text" class="textareaN" name="seid" value="<?php echo $seid ?>"> </td>
            </tr>
           </table>
           <div id="m_empbtn">
           <button type="submit" class="btnN" name="mbutton" value="load">Load</button>         </div>
         <div align="center">
           <button type="submit" class="btnL" name="rfresh">Refresh </button>
         </div>
         </div>
        </form>
      
           <div class="light">
             <form action="application.php" method="post">

               <button type="submit" class="btnL" name="va">View all Applications</button><br>

            </form>

               <div id="search" align="right">
                 <table >
                   <tr>
                   <form action="application.php" method="post">
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter App ID"name="sidtb" value=""><button type="submit" class="btnN" name="s1">search</button> </td>
                   </tr>
                   <tr>
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter Tenant Id "name="ridtb" value=""> <button type="submit" class="btnN" name="s2">search</button></td>
                   </tr>
                  </form>
                   <tr>
                   <td>
                   

                   <?php
                            if ($rowCounta > 0) {
                       
                              echo"<table>";
                              echo "<tr><th>" . "ID"."  " . "</th><th>" ."subject"."  " . "</th><th>"
                             ."sender Id". "   " ."</th></tr>";
                              while($rowa = mysqli_fetch_assoc($resulta)) {
                              echo "<tr><td>" . $rowa["aid"]."   " ."</td><td>" . $rowa["sub"] ."   " . "</td><td>"
                              . $rowa["seid"]. "   " ."</td></tr>";
                              }
                              echo "</table>";
                              } else { echo "No Data Available"; }

                       
                        ?>
                 
                    
                   </td>
                   </tr>
                 </table>
     
             </div>
           </div>

     </section>


  </body>
</html>
