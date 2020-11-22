<?php

session_start();
if(!(isset($_SESSION['username'])))
{
  header("Location:login.php");
}
include "includes/db_connect.inc.php";
$q = $_GET['q'];
$perPage = 2;
$a = 1;
 $c_key = "";
$startingRow = ($a-1)*$perPage;



if($q=="va") {
    $sqla = "SELECT id, name, rnum FROM tenant limit $startingRow, $perPage";}

else{
    $sqla = "SELECT id, name, rnum FROM tenant where rnum='$q' limit $startingRow, $perPage";
}

$resulta = mysqli_query($conn, $sqla);
$rowCounta = mysqli_num_rows($resulta);
$totalCommentsQuery = "SELECT COUNT(*) as t_c FROM tenant";
$resultTotalComments = mysqli_query($conn, $totalCommentsQuery);
$rowTotalComments = mysqli_fetch_assoc($resultTotalComments);
$tC = $rowTotalComments['t_c'];
$tC = $rowCounta['t_c'];
$np = ceil($tC/$perPage);
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>




  <?php
                        if ($rowCounta > 0) {
                   
                          echo"<table>";
                          echo "<tr><th>" . "ID"."  " . "</th><th>" ."NAME"."  " . "</th><th>"
                         ."ROOM". "   " ."</th></tr>";
                          while($rowa = mysqli_fetch_assoc($resulta)) {
                          echo "<tr><td>" . $rowa["id"]."   " ."</td><td>" . $rowa["name"] ."   " . "</td><td>"
                          . $rowa["rnum"]. "   " ."</td></tr>";
                          }
                          echo "</table>";
                          } else { echo ""; }
  ?>




        <?php
        if ($startingRow > 0) { ?>
            <a class="btnpg" href="pagination.php?x=<?php echo ($a-1); ?>">Previous</a>
        <?php
        }

        for ($i=1; $i <= $np; $i++) { ?>
            <a class="btnpg" href="pagination.php?x=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php

            }

        if (($startingRow < ($tC-1)))
        { ?>
            <a class="btnpg" href="pagination.php?x=<?php echo ($a+1); ?>">Next</a>

            <?php
        }
        ?>
  </body>
</html>



