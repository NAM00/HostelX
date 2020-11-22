<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

session_start();
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
include "includes/db_connect.inc.php";

$esal=$ephn=$ename=$eid=$eemail=$eaddrs=$message=$inpass=$sqla=$resulta =$rowCounta = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['rfresh']))
  {
    unset($_POST['mbutton']);
    unset($_POST['btnL']);
    $esal=$ephn=$ename=$eid=$eemail=$eaddrs="";


  }
  if(isset($_POST['va']))
  {
    $sqla = "SELECT id, name, sal FROM emp";
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
    $sqla = "SELECT id, name, esal FROM tenant where id='$sid'";
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
    $sqla = "SELECT id, name, esal FROM tenant where esal='$rid'";
    $resulta = mysqli_query($conn, $sqla);
    $rowCounta = mysqli_num_rows($resulta);
    echo "hi";
    unset($_POST['s2']);
  }
  switch ($_POST['mbutton'])
   {
    case 'insert':
      
      if(!empty($_POST['eid'])){
        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
      }
      if(!empty($_POST['ename'])){
        $ename = mysqli_real_escape_string($conn, $_POST['ename']);
      }
      if(!empty($_POST['ephn'])){
        $ephn = mysqli_real_escape_string($conn, $_POST['ephn']);
      }
      if(!empty($_POST['eemail'])){
        $eemail = mysqli_real_escape_string($conn, $_POST['eemail']);
      }
      if(!empty($_POST['eaddrs'])){
        $eaddrs = mysqli_real_escape_string($conn, $_POST['eaddrs']);
      }
      if(!empty($_POST['esal'])){
        $esal = mysqli_real_escape_string($conn, $_POST['esal']);
      }
      if((!empty($eid))&&(!empty($ename))&&(!empty($ephn))&&(!empty($eaddrs))&&(!empty($esal)))
      {
                $sql1 = "INSERT INTO emp(ID,NAME,PHONE,EMAIL,ADRS,sal)VALUES ('$eid','$ename','$ephn','$eemail','$eaddrs','$esal');";
              
                if(mysqli_query($conn, $sql1))
                {
                
                  $sql2 = "INSERT INTO LOGIN(ID,PASS,ROLE)VALUES ('$eid',RAND(),2);";
                  if(mysqli_query($conn, $sql2))
                  {
                    $message = " Added";
                    unset($_POST['mbutton']);
                    $esal=$ephn=$ename=$eid=$eemail=$eaddrs="";
          
                  
                  }
                  else{
                    $message = "Login Table failed";
                  }
          
          
                }
                else{
                  $message = "insertion failed";
                }
          
            echo "<script type='text/javascript'>alert('$message');</script>";

  
        
      }
      else
      {
        echo "<script type='text/javascript'>alert('Fill up all the fields');</script>";

      }
      unset($_POST['mbutton']);
    break;
    case 'load':
      if(!empty($_POST['eid'])){
        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
        $sql = "SELECT * FROM Emp WHERE ID = '$eid'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount < 1){
          $message = "User does not exist!";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }else{
          while($row = mysqli_fetch_assoc($result)){
            $ename=$row['name'];
            $ephn=$row['phone'];
            $eemail=$row['email'];
            $eaddrs=$row['adrs'];
            $esal=$row['sal'];
            
          }
          unset($_POST['load']);
        }


      }
      else{
        echo "<script type='text/javascript'>alert('Enter tenant id');</script>";

      }

      unset($_POST['mbutton']);
    break;
    case 'update':

      if(!empty($_POST['eid'])){
        $eid = mysqli_real_escape_string($conn, $_POST['eid']);
      }
      if(!empty($_POST['ename'])){
        $ename = mysqli_real_escape_string($conn, $_POST['ename']);
      }
      if(!empty($_POST['ephn'])){
        $ephn = mysqli_real_escape_string($conn, $_POST['ephn']);
      }
      if(!empty($_POST['eemail'])){
        $eemail = mysqli_real_escape_string($conn, $_POST['eemail']);
      }
      if(!empty($_POST['eaddrs'])){
        $eaddrs = mysqli_real_escape_string($conn, $_POST['eaddrs']);
      }
      if(!empty($_POST['esal'])){
        $esal = mysqli_real_escape_string($conn, $_POST['esal']);
      }
      if((!empty($eid))&&(!empty($ename))&&(!empty($ephn))&&(!empty($eaddrs))&&(!empty($esal)))
      {
                      $sql1 = "UPDATE  emp SET NAME='$ename',PHONE='$ephn', EMAIL='$eemail', ADRS='$eaddrs',esal='$esal' WHERE id='$eid';";
                      if(mysqli_query($conn, $sql1))
                      {
                  
                    
                    
                        $message = "UPDATED";
                        unset($_POST['mbutton']);
                        $esal=$ephn=$ename=$eid=$eemail=$eaddrs="";
            
                    
                  
            
            
                      }
                      else
                      {
                        $message = " UPDATING failed";
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
    $esal=$ephn=$ename=$eid=$eemail=$eaddrs="";
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
  <link rel="stylesheet" href="./css/adminstyle.css">
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
          <li><a href="m_employee.php">Manage  Hostel Super</a></li>
          <li class="current"><a href="m_student.php">Manage Student</a></li>
          <li><a href="application.php">Messages Application</a></li>
          <li><a href="complaints.php">Message Complaints</a></li>
          <li><a href="m_admin.php">Manage Admin</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section align ="center" id="addemp">
         <div class="m_emp">
          <form action="m_employee.php" method="post">
           <table>
             <th><h1>Manage Hostel Super</h1></th>
             <tr id="t">
               <td> <label> Hostel Super ID:</label> </td>
               <td> <input type="text" class="textareaN" name="eid" value="<?php echo $eid ?>"> </td>
             </tr>
             <tr id="t">
               <td> <label>Hostel Super Name: </label> </td>.
               <td> <input type="text" class="textareaN" name="ename" value="<?php echo $ename ?>"> </td>
             </tr>
             <tr id="t">
               <td> <label>Hostel Super Number</label> </td>
               <td> <input type="text" class="textareaN" name="ephn" value="<?php echo $ephn ?>"> </td>
             </tr>
             <tr id="t">
              <td> <label>Hostel Super email</label> </td>
              <td> <input type="text" class="textareaN" name="eemail" value="<?php echo $eemail ?>"> </td>
            </tr>
             <tr id="t">
               <td> <label>Hostel Super address </label> </td>
               <td> <input type="text" class="textareaN" name="eaddrs" value="<?php echo $eaddrs ?>"> </td>
             </tr>
             <tr >
               <td> <label>Hostel Super salary</label> </td>
               <td> <input type="text" class="textareaN" name="esal" value="<?php echo $esal ?>"> </td>
             </tr>
           </table>
           <div id="m_empbtn">
           <button type="submit" class="btnN" name="mbutton" value="load">Load</button>
           <button type="submit" class="btnN" name="mbutton" value="insert">Insert</button>

           <button type="submit" class="btnN" name="mbutton" value="update">Update</button>
         </div>
         <div align="center">
           <button type="submit" class="btnL" name="rfresh">Refresh </button>
         </div>
         </div>
        </form>
      
           <div class="light">
             <form action="m_employee.php" method="post">

               <button type="submit" class="btnL" name="va">View all Hostel Super</button><br>

            </form>

               <div id="search" align="right">
                 <table >
                   <tr>
                   <form action="m_employee.php" method="post">
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter Emp ID"name="sidtb" value=""><button type="submit" class="btnN" name="s1">search</button> </td>
                   </tr>
                   <tr>
                   <td> <label><b>Search</label> 
                    <input type="text" class="textareaL" placeholder="enter salary "name="ridtb" value=""> <button type="submit" class="btnN" name="s2">search</button></td>
                   </tr>
                  </form>
                   <tr>
                   <td>
                   

                   <?php
                            if ($rowCounta > 0) {
                       
                              echo"<table>";
                              echo "<tr><th>" . "ID"."  " . "</th><th>" ."NAME"."  " . "</th><th>"
                             ."ROOM". "   " ."</th></tr>";
                              while($rowa = mysqli_fetch_assoc($resulta)) {
                              echo "<tr><td>" . $rowa["id"]."   " ."</td><td>" . $rowa["name"] ."   " . "</td><td>"
                              . $rowa["sal"]. "   " ."</td></tr>";
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
