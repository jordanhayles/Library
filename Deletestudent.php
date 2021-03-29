<?php
//delete client
include "database.php";//database connection
$count=$_GET['count'];
$del="DELETE FROM `student` WHERE count='$count'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Studentlist.php";
echo "<script>location.href='$URL'</script>";      

?>