<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

session_start();
if(!(isset($_SESSION['username'])))
{
  header("Location:../login.php");
}
include "includes/db_connect.inc.php";

$tRoom=$tPhn=$tName=$tid=$tEmail=$tAddrs=$message=$inpass=$sqla=$resulta =$rowCounta = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['rfresh']))
  {
    unset($_POST['mbutton']);
    unset($_POST['btnL']);
    $tRoom=$tPhn=$tName=$tid=$tEmail=$tAddrs="";


  }

  switch ($_POST['mbutton'])
   {
    case 'insert':
      
      if(!empty($_POST['tid'])){
        $tid = mysqli_real_escape_string($conn, $_POST['tid']);
      }
      if(!empty($_POST['tname'])){
        $tName = mysqli_real_escape_string($conn, $_POST['tname']);
      }
      if(!empty($_POST['tphn'])){
        $tPhn = mysqli_real_escape_string($conn, $_POST['tphn']);
      }
      if(!empty($_POST['temail'])){
        $tEmail = mysqli_real_escape_string($conn, $_POST['temail']);
      }
      if(!empty($_POST['taddrs'])){
        $tAddrs = mysqli_real_escape_string($conn, $_POST['taddrs']);
      }
      if(!empty($_POST['troom'])){
        $tRoom = mysqli_real_escape_string($conn, $_POST['troom']);
      }
      if((!empty($tid))&&(!empty($tName))&&(!empty($tPhn))&&(!empty($tAddrs))&&(!empty($tRoom)))
      {
        $sql = "SELECT * FROM ROOM WHERE RNO = '$tRoom'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount < 1){
          $message = "This room does not exist!\n Please enter another Room ";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }else
        {
          while($row = mysqli_fetch_assoc($result)){
            $tseat=$row['ts'];
            $Oseat=$row['os'];  
          }
          if($tseat>$Oseat)
          {
            $Oseat=($Oseat+1);
            echo "<script type='text/javascript'>alert('$Oseat');</script>";

            $sqlr = "UPDATE  ROOM SET OS='$Oseat' where RNO='$tRoom'";
            
            if(mysqli_query($conn, $sqlr))
              {


                $sql1 = "INSERT INTO TENANT(ID,NAME,PHONE,EMAIL,ADRS,RNUM)VALUES ('$tid','$tName','$tPhn','$tEmail','$tAddrs','$tRoom');";
              
                if(mysqli_query($conn, $sql1))
                {
                
                  $sql2 = "INSERT INTO LOGIN(ID,PASS,ROLE)VALUES ('$tid',RAND(),3);";
                  if(mysqli_query($conn, $sql2))
                  {
                    $message = "Tenant Added";
                    unset($_POST['mbutton']);
                    $tRoom=$tPhn=$tName=$tid=$tEmail=$tAddrs="";
          
                  
                  }
                  else{
                    $message = "Login Table failed";
                  }
          
          
                }
                else{
                  $message = "Tenant insertion failed";
                }
              }

              else {
                $message = "Room has not updated";
              }
          
            echo "<script type='text/javascript'>alert('$message');</script>";

          }
          else {
            echo "<script type='text/javascript'>alert('this room is fully occupied');</script>";
          }
        }
      }
      else
      {
        echo "<script type='text/javascript'>alert('Fill up all the fields');</script>";

      }
      unset($_POST['mbutton']);
    break;
    case 'load':
      if(!empty($_POST['tid'])){
        $tid = mysqli_real_escape_string($conn, $_POST['tid']);
        $sql = "SELECT * FROM TENANT WHERE ID = '$tid'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount < 1){
          $message = "User does not exist!";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }else{
          while($row = mysqli_fetch_assoc($result)){
            $tName=$row['name'];
            $tPhn=$row['phone'];
            $tEmail=$row['email'];
            $tAddrs=$row['adrs'];
            $tRoom=$row['rnum'];
            
          }
          unset($_POST['mbutton']);
        }


      }
      else{
        echo "<script type='text/javascript'>alert('Enter tenant id');</script>";

      }

      unset($_POST['mbutton']);
    break;
    case 'update':

      if(!empty($_POST['tid'])){
        $tid = mysqli_real_escape_string($conn, $_POST['tid']);
      }
      if(!empty($_POST['tname'])){
        $tName = mysqli_real_escape_string($conn, $_POST['tname']);
      }
      if(!empty($_POST['tphn'])){
        $tPhn = mysqli_real_escape_string($conn, $_POST['tphn']);
      }
      if(!empty($_POST['temail'])){
        $tEmail = mysqli_real_escape_string($conn, $_POST['temail']);
      }
      if(!empty($_POST['taddrs'])){
        $tAddrs = mysqli_real_escape_string($conn, $_POST['taddrs']);
      }
      if(!empty($_POST['troom'])){
        $tRoom = mysqli_real_escape_string($conn, $_POST['troom']);
      }
      if((!empty($tid))&&(!empty($tName))&&(!empty($tPhn))&&(!empty($tAddrs))&&(!empty($tRoom)))
      {
        $sqlb = "SELECT * FROM TENANT WHERE ID = '$tid'";
        $resultb = mysqli_query($conn, $sqlb);
        $rowCountb = mysqli_num_rows($resultb);
        if($rowCountb < 1)
        {
          $message = "This tenant does not exist!\n Please enter another id ";
          echo "<script type='text/javascript'>alert('$message');</script>";

        }
        else
        {
          while($row = mysqli_fetch_assoc($resultb))
          {
            $before_room=$row['rnum']; 
          }
          $sql = "SELECT * FROM ROOM WHERE RNO = '$before_room'";
          $result = mysqli_query($conn, $sql);
          $rowCount = mysqli_num_rows($result);
          if($rowCount < 1){
            $message = "This room does not exist!\n Please enter another Room ";
            echo "<script type='text/javascript'>alert('$message');</script>";
  
          }
          else
          {
              while($row = mysqli_fetch_assoc($result))
              {
              
                $Oseatb=$row['os'];  
              }
           
              $Oseatb=($Oseatb-1);
              echo "<script type='text/javascript'>alert('$Oseatb');</script>";
  
              $sqlr = "UPDATE  ROOM SET OS='$Oseatb' where RNO ='$before_room'";
              if(mysqli_query($conn, $sqlr))
              {
                $sql = "SELECT * FROM ROOM WHERE RNO = '$tRoom'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount < 1){
                  $message = "This room does not exist!\n Please enter another Room ";
                  echo "<script type='text/javascript'>alert('$message');</script>";
  
                }else
                {
                  while($row = mysqli_fetch_assoc($result)){
                    $tseat=$row['ts'];
                    $Oseat=$row['os'];  
                  }
                  if($tseat>$Oseat)
                  {
                    $Oseat=($Oseat+1);
                    echo "<script type='text/javascript'>alert('$Oseat');</script>";
  
                    $sqlr = "UPDATE  ROOM SET OS='$Oseat' where RNO='$tRoom'";
                    
                    if(mysqli_query($conn, $sqlr))
                    {
                      $sql1 = "UPDATE  TENANT SET NAME='$tName',PHONE='$tPhn', EMAIL='$tEmail', ADRS='$tAddrs',RNUM='$tRoom' WHERE id='$tid';";
                      if(mysqli_query($conn, $sql1))
                      {
                  
                    
                    
                        $message = "Tenant UPDATED";
                        unset($_POST['mbutton']);
                        $tRoom=$tPhn=$tName=$tid=$tEmail=$tAddrs="";
            
                    
                  
            
            
                      }
                      else
                      {
                        $message = "Tenant UPDATING failed";
                      }
  
                    }
                    else 
                    {
                      $message = "Room has not updated";
                    }
  
                  }
                  else 
                  {
                    echo "<script type='text/javascript'>alert('this room is fully occupied');</script>";
                  }
                }

              }
              else
              {
               echo "<script type='text/javascript'>alert('There is a problem in previous room');</script>";
              }
              


                

        
            
              echo "<script type='text/javascript'>alert('$message');</script>";
              
          }
          
        }

      }
      else
      {
        echo "<script type='text/javascript'>alert('Fill up all the fields');</script>";

      }
      unset($_POST['mbutton']);
    break;

    default:
    unset($_POST['mbutton']);
    $tRoom=$tPhn=$tName=$tid=$tEmail=$tAddrs="";
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
    <script>
function ajpag(str) {
  if (str == "") {
    document.getElementById("tb").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tb").innerHTML = this.responseText;
      }
      else{
        document.getElementById("tb").innerHTML = this.status;
      }
    };
    xmlhttp.open("GET","stu_pagi.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
      <div class="container">
        <div id="branding">
          <h1 class="logo"><span class="highlight">HostelX</span></h1>
        </div>
        <nav>
        <ul>
          <li><a href="admin.php">Home</a></li>
          <li class="current"><a href="m_student.php">Manage Student</a></li>
          <li><a href="application.php"> Application</a></li>
          <li><a href="complaints.php">Complaints</a></li>
          <li><a href="m_admin.php">Rent</a></li>
          <li><a href="../index.php">Log OUT</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section align ="center" id="addemp">
         <div class="m_emp">
          <form action="m_student.php" method="post">
           <table>
             <th><h1>Manage Tenant</h1></th>
             <tr>
               <td> <label> Tenant ID:</label> </td>
               <td> <input type="text" class="textareaN" name="tid" value="<?php echo $tid ?>"> </td>
             </tr>
             <tr>
               <td> <label>Tenant Name: </label> </td>.
               <td> <input type="text" class="textareaN" name="tname" value="<?php echo $tName ?>"> </td>
             </tr>
             <tr>
               <td> <label>Tenant Number</label> </td>
               <td> <input type="text" class="textareaN" name="tphn" value="<?php echo $tPhn ?>"> </td>
             </tr>
             <tr>
              <td> <label>Tenant email</label> </td>
              <td> <input type="text" class="textareaN" name="temail" value="<?php echo $tEmail ?>"> </td>
            </tr>
             <tr>
               <td> <label>Tenant address </label> </td>
               <td> <input type="text" class="textareaN" name="taddrs" value="<?php echo $tAddrs ?>"> </td>
             </tr>
             <tr>
               <td> <label>Room number</label> </td>
               <td> <input type="text" class="textareaN" name="troom" value="<?php echo $tRoom ?>"> </td>
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
             <form action="m_student.php" method="post">

               <button type="button" class="btnL" name="va" id="va" value="va" onclick="ajpag(this.value)">View all Tenant</button><br>

            </form>

               <div id="search" align="right">
                 <table >
                 
                   <form action="m_student.php" method="post">
   
                   <tr>
                   <td> <label>Search Room</label> 
                    <input type="text" class="textareaL" placeholder="enter Room ID"name="ridtb" id="s2t"value="">
                     <button type="button" class="btnN" name="s2" onclick="ajpag(s2t.value)">search</button></td>
                   </tr>
                  </form>
                   <tr>
                   <td id="tb">
                   


                 
                    
                   </td>
                   </tr>
                 </table>
     
             </div>
           </div>

     </section>


  </body>
</html>
