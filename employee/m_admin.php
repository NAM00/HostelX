
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

session_start();
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
include "includes/db_connect.inc.php";

$esal=$paid=$payable=$id=$mnth=$year=$message=$inpass=$sqla=$resulta = $room=$rowCounta = $Due= "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['rfresh']))
  {
    unset($_POST['mbutton']);
    unset($_POST['btnL']);
    $esal=$paid=$payable=$id=$mnth=$year="";


  }
  if(isset($_POST['va']))
  {
    $sqla = "SELECT * FROM tp";
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
    $sqla = "SELECT * FROM tp where id='$sid'";
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
        $sqla = "SELECT * FROM tp where month='$rid'";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['s2']);
  }
  if(isset($_POST['s3']))
  {
    if(!empty($_POST['midtb'])){
      $mid = mysqli_real_escape_string($conn, $_POST['midtb']);
    }
        $sqla = "SELECT * FROM tp where month='$mid' AND due>0";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['s3']);
  }
  switch ($_POST['mbutton'])
   {
    case 'insert':
      
      if(!empty($_POST['id'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
      }
    
      if(!empty($_POST['paid'])){
        $paid = mysqli_real_escape_string($conn, $_POST['paid']);
      }
      if(!empty($_POST['mnth'])){
        $mnth = mysqli_real_escape_string($conn, $_POST['mnth']);
      }
      if(!empty($_POST['year'])){
        $year = mysqli_real_escape_string($conn, $_POST['year']);
      }
      if((!empty($id))&&(!empty($mnth))&&(!empty($paid))&&(!empty($year)))
      {
                $sql1 = "SELECT rnum from tenant where ID='$id';";
                $result = mysqli_query($conn, $sql1);
                $rowCount = mysqli_num_rows($result);
                if($rowCount > 0)
                {
                  while($row = mysqli_fetch_assoc($result))
                    {
                      $room=$row['rnum'];

                    }
                  }
                  else{
                    echo "hotash";
                  }


                $sql1 = "SELECT psr from room where rno='$room';";
                $result = mysqli_query($conn, $sql1);
                $rowCount = mysqli_num_rows($result);
                if($rowCount > 0)
                {
                  while($row = mysqli_fetch_assoc($result))
                    {
                      $payable=$row['psr'];

                    }
                    $Due=(($payable-$paid)+0);

                  $sql2 = "INSERT INTO TP(ID,payable,paid,due,month,year)VALUES ('$id','$payable','$paid',' $Due','$mnth','$year');";

                  if(mysqli_query($conn, $sql2))
                  {
                    $message = " Added";
                    unset($_POST['mbutton']);
                    $esal=$paid=$payable=$id=$mnth=$year="";
          
                  
                  }
                  else{
                    $message = "NOT SUCCESSFUL";
                  }
          
          
                }
                else{
                  $message = "FAILED";
                }
          
            echo "<script type='text/javascript'>alert('$message');</script>";

  
        
        }
        else
        {
          echo "<script type='text/javascript'>alert('Fill up all the fields');</script>";

        }
        unset($_POST['mbutton']);
      break;
      
      

      default:
      unset($_POST['mbutton']);
      $esal=$paid=$payable=$id=$mnth=$year="";
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
          <li><a href="employee.php">Home</a></li>
          <li ><a href="m_student.php">Manage Student</a></li>
          <li><a href="application.php">Messages Application</a></li>
          <li><a href="complaints.php">Message Complaints</a></li>
          <li class="current"><a href="m_admin.php">Manage Rent</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section align ="center" id="addemp">
         <div class="m_emp">
          <form action="m_admin.php" method="post">
           <table>
             <th><h1>Manage Rent</h1></th>
             <tr id="t">
               <td> <label> Tenant ID:</label> </td>
               <td> <input type="text" class="textareaN" name="id" value="<?php echo $id ?>"> </td>
             </tr>
 
             <tr id="t">
               <td> <label>Paid Amount</label> </td>
               <td> <input type="text" class="textareaN" name="paid" value="<?php echo $paid ?>"> </td>
             </tr>
             <tr id="t">
              <td> <label>Month</label> </td>
              <td>         <select name="mnth">
          <option value="" disabled selected>Select Month</option>
          <option value="JAN">JAN</option>
          <option value="FEB">FEB</option>
          <option value="MAR">MAR</option>
          <option value="APR">APR</option>
          <option value="MAY">MAY</option>
          <option value="JUN">JUN</option>
          <option value="JUL">JUL</option>
          <option value="AUG">AUG</option>
          <option value="SEP">SEP</option>
          <option value="OCT">OCT</option>
          <option value="NOV">NOV</option>
          <option value="DEC">DEC</option>
        </select> </td>
            </tr>
             <tr id="t">
               <td> <label>Year </label> </td>
               <td> <input type="text" class="textareaN" name="year" value="<?php echo $year ?>"> </td>
             </tr>
           </table>
           <div id="m_empbtn">
           <button type="submit" class="btnN" name="mbutton" value="insert">Insert</button>

         </div>
         <div align="center">
           <button type="submit" class="btnL" name="rfresh">Refresh </button>
         </div>
         </div>
        </form>
      
           <div class="light">
             <form action="m_admin.php" method="post">

               <button type="submit" class="btnL" name="va">View all Payment record</button><br>

            </form>

               <div id="search" align="right">
                 <table >
                   <tr>
                   <form action="m_admin.php" method="post">
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter tenant id"name="sidtb" value=""><button type="submit" class="btnN" name="s1">search</button> </td>
                   </tr>
                   <tr>
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter month"name="ridtb" value=""> <button type="submit" class="btnN" name="s2">search</button></td>
                   </tr>
                   <tr>
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter month"name="midtb" value=""> <button type="submit" class="btnN" name="s3">Dues</button></td>
                   </tr>

                  </form>
                   <tr>
                   <td>
                   

                   <?php
                            if ($rowCounta > 0) {
                       
                              echo"<table>";
                              echo "<tr><th>" . "ID"."  " . "</th><th>" ."PAID"."  " . "</th><th>"
                             ."MONTH"."  " . "</th><th>"."DUE". "   " ."</th></tr>";
                              while($rowa = mysqli_fetch_assoc($resulta)) {
                              echo "<tr><td>" . $rowa["id"]."   " ."</td><td>" . $rowa["paid"] ."   " . "</td><td>"
                              . $rowa["month"] ."   " . "</td><td>". $rowa["due"]. "   " ."</td></tr>";
                              }
                              echo "</table>";
                              } else { echo ""; }

                       
                        ?>
                 
                    
                   </td>
                   </tr>
                 </table>
     
             </div>
           </div>

     </section>


  </body>
</html>
