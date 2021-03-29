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
    $sql2="select * from book";
    $result2 = mysqli_query($dbh,$sql2);
    ?>
    <?php         
    if (isset($_POST['searchbtn']))//search item record
    {
        $value=$_POST['search']; 
        $sql="SELECT * FROM `book` WHERE CONCAT (`isbn`,`title`,`description`,`publisher`,`pubyear`,`author`,`category`,`condition1`) LIKE '%".$value."%'"; 
$result=filterTable($sql);   
    }
    else
    {
        $sql="SELECT * FROM `book`"; //show items
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
 include "Session.php"; //Display user information when logged in
?>   
<body >
<br><br><br><br><br>

<form action="Booksborrowed.php" method="POST">
    <br>
 <table width="500px">
     <tr>
       <td><input type=text class="border" name="search" placeholder="Search Book"></td><td><input type=submit class="Submit"  name="searchbtn" value="Search">
        </td>
         </tr>
     <tr><td ><a href="Booklist2.php"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a></td></tr>
     </table>
  
          <table class="t-view">
    <caption style="caption-side: top;" ><h5>Borrowed Books</h5></caption>
<tr>
    <th>ISBN</th>
    <th>Title</th>
    <th>Description</th>
    <th>Publisher</th>
    <th>Publish Year</th>
     <th>Author</th>
      <th>Category</th>
        <th>Conditon</th>
     <th>Borrowed</th>
</tr> 
    <?php while($row=mysqli_fetch_array($result2)) {if ($row["borrow"]=='yes') //show all clients with in-active accounts
    { ?>
        <tr>
          <td class="td-view"><?php echo $row['isbn'];?></td>
        <td class="td-view"><?php echo $row['title'];?></td>
         <td class="td-view"><?php echo $row['description'];?></td>
             <td class="td-view"><?php echo $row['publisher'];?></td>
            <td class="td-view" ><?php echo $row['pubyear'];?></td>
             <td class="td-view" ><?php echo $row['author'];?></td>
             <td class="td-view" ><?php echo $row['category'];?></td>
             <td class="td-view" ><?php echo $row['condition1'];?></td>
           <td class="td-view" ><?php echo $row['borrow'];?></td>
        
           
        
            <td><a href="Returnbook.php?id=<?php echo $row['id']; ?>">Return</a></td> 
           
        </tr>
        <?php }}?>    
</table>
    </form>
    
</body>
    <br><br><br><br><br><br><br><br>
    <footer ><b>Copyright &copy;2019</b></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>