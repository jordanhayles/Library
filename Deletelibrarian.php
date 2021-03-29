<?php
//delete client
include "database.php";//database connection
$count=$_GET['count'];
$del="DELETE FROM `librarian` WHERE count='$count'";
 $result=mysqli_query($dbh,$del);
echo '<script type="text/javascript">';
echo 'alert ("Record is deleted!")';
echo '</script>';
      $URL="Librarianlist.php";
echo "<script>location.href='$URL'</script>";      

?>