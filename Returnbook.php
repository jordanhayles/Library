<?php
//Suspending students
include "database.php";//database connection
$id=$_GET['id'];
 $sus="UPDATE book SET borrow = 'no' WHERE id = '$id'";
 $result=mysqli_query($dbh,$sus);
echo '<script type="text/javascript">';
echo 'alert ("Book Returned!")';
echo '</script>';
      $URL="Booksborrowed.php";
echo "<script>location.href='$URL'</script>";      

?>