<?php
include "includes/db_connect.inc.php";

session_start();
$uPass = $uName = $message = $role = "";

/* mysqli_real_escape_string() helps prevent sql injection */
if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(!empty($_POST['u_name'])){
		$uName = mysqli_real_escape_string($conn, $_POST['u_name']);
	}
	if(!empty($_POST['u_pass'])){
		$uPass = mysqli_real_escape_string($conn, $_POST['u_pass']);
	}

	$sqlUserCheck = "SELECT id, pass, role FROM login WHERE id = '$uName'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['pass'];
            $role=$row['role'];

			if(($uPass===$uPassInDB)||(password_verify($uPass, $uPassInDB))){
                $_SESSION['username'] = $uName;
                $message = "pass verified!";
                if($role ==1){
				header("Location: admin/admin.php");
                }
                elseif($role ==2)
                {
                    header("Location: employee/employee.php"); 
                }
                else {
                    header("Location: student/student.php");
                }
            }

            else{
				$message = "Wrong Password!";
			}
			

		}
	}
}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <style>
      .Login{
          padding:150px

      }
    
        #uname_lb{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            width: 300px;
            length:50px;
            padding:5px;
        }
        #uname_tb{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            width: 300px;
            length:50px;
            padding:5px;
        }
        #pass_lb{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            width: 300px;
            length:50px;
            padding:5px;
        }
        #pass_tb{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            width: 300px;
            length:50px;
            padding:5px;
        }
        #lgin_btn{
            margin-top: 30px;
            border: none;
            background-color:  rgb(159, 233, 196);;
            color: white;
            padding: 8px 14px;
            margin-bottom:12px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        #lgin_btn:hover{
            background-color:rgb(186, 163, 230);
        }
        #uname{
            padding: 10px 10px;

        }
        #pass{
            padding: 10px 10px;

        }
        #body{
            background-color: rgb(99, 132, 143);
            

        }
       


  </style>

  <body id="body">
    <div  class="Login" align="center">
     <form action="login.php" method="post">
         <div id="uname" align="center">
  
        <label id="uname_lb"for="u_name">Username: </label>
        <input id="uname_tb" type="text" name="u_name" value="" required><br>
        </div>
        <div id="pass" align="center">
        <label id="pass_lb" for="u_pass">Password: </label>
        <input id="pass_tb" type="password" name="u_pass" value="" required><br>
        </div>
        <div align="center">
        <button id="lgin_btn" type="submit" name="login" >Login</button>
    
                <span style="color:red"><?php echo $message; ?></span><br>
    </div>
         
                
         
         </form>
    <div>
  </body>
</html>
