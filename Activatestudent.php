<?php
include "database.php";  //database connection file
//Activating student account
$count=$_GET['count'];
 $sus="UPDATE student SET active = 'yes' WHERE count = '$count'";//sql command
 $result=mysqli_query($dbh,$sus); //Execute command
echo '<script type="text/javascript">';
echo 'alert ("User Account is activated!")'; //alert message
echo '</script>';
      $URL="Studentlist.php";
echo "<script>location.href='$URL'</script>";      

?>