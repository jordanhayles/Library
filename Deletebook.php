<?php
//delete client
include "database.php";//database connection
$id=$_GET['id'];
$del="DELETE FROM `book` WHERE id='$id'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Booklist.php";
echo "<script>location.href='$URL'</script>";      

?>