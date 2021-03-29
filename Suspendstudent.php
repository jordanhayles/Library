<?php
//Suspending students
include "database.php";//database connection
$count=$_GET['count'];
 $sus="UPDATE student SET active = 'no' WHERE count = '$count'";
 $result=mysqli_query($dbh,$sus);
echo '<script type="text/javascript">';
echo 'alert ("User is suspended!")';
echo '</script>';
      $URL="Studentlist.php";
echo "<script>location.href='$URL'</script>";      

?>