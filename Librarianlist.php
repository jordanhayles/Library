<html>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
       <?php include "List.css"?>
    <?php 
    
        include "database.php"; //database connection
    $output='';
    ?>
    <?php         
    if (isset($_POST['searchbtn']))//search item record
    {
        $value=$_POST['search']; 
        $sql="SELECT * FROM `librarian` WHERE CONCAT (`id`,`fname`,`mname`,`lname`,`email`,`address`,`department`,`pass`,`conpass`) LIKE '%".$value."%'"; 
$result=filterTable($sql);   
    }
    else
    {
        $sql="SELECT * FROM `librarian`"; //show items
        $result=filterTable($sql);
    }
    
    function filterTable($sql)
    {
        $connect=mysqli_connect("localhost","root","","library");
        $filter_Result=mysqli_query($connect, $sql);
        return $filter_Result;
    }
    ?>
   
<?php
 include "View.css"; //Display user information when logged in
?>  

    
   <?php
 include "Session2.php"; //Display user information when logged in
?>   

    
    
<body>
    <br><br><br><br><br>
    <form action="Librarianlist.php" method="POST">
    <br>
 <table width="500px">
     <tr>
       <td><input type=text class="border" name="search" placeholder="Search Librarian"></td><td><input type=submit class="Submit"  name="searchbtn" value="Search"></td><td>
        </td>
         </tr>
     <tr><td ><a href="Adduser.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></td></tr>
     </table>
  <table class="t-view">
    <caption style="caption-side: top;" ><h5>Librarian List</h5></caption>
<tr>
    <th>First Name</th>
    <th>Middle Initial</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Address</th>
    <th>Department</th>
    <th>Username/ID</th>
    <th>Password</th>
    <th>Confirm Password</th>
</tr> 
    <?php while($row=mysqli_fetch_array($result)) { ?> <!--table data showing item records-->
        <tr>
          
        <td class="td-view"><?php echo $row['fname'];?></td>
         <td class="td-view"><?php echo $row['mname'];?></td>
             <td class="td-view"><?php echo $row['lname'];?></td>
            <td class="td-view" ><?php echo $row['email'];?></td>
              <td class="td-view" ><?php echo $row['address'];?></td>
              <td class="td-view" ><?php echo $row['department'];?></td>
              <td class="td-view" ><?php echo $row['id'];?></td>
            <td class="td-view" ><?php echo $row['pass'];?></td>
            <td class="td-view" ><?php echo $row['conpass'];?></td>
           
            <td><a href="Updatelibrarian.php?count=<?php echo $row['count'];?>">Update</a></td> 
           <td><a href="Deletelibrarian.php?count=<?php echo $row['count']; ?>">Delete</a></td>
        </tr>
        <?php }?>     
</table>
    </form>
</body>



 <br><br><br><br><br><br><br><br>

<footer >Copyright &copy;2019</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>