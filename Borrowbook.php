<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
<?php
    
    $user=$date=$isbn=$insertxt=$title=$describe=$publisher=$pubyear=$author=$category=$condition="";//Variable used for storing form data 
 $usererr=$dateerr=$isbnerr=$titleerr=$deserr=$publishererr=$pubyearerr=$authorerr=$categoryerr=$conditionerr=""; //Error variables
    
     include "database.php"; //Connects to mysql database
    $id=$_GET['id'];
    $sql="select * from book where id='$id'"; //show client record
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
        if(isset($_POST['borrow']))
    {
        $isbn=($_POST['isbn']);
        $title=($_POST['title']);
        $describe=($_POST['describe']);
        $publisher=($_POST['publisher']);
        $pubyear=($_POST['pubyear']);
        $author=($_POST['author']);
        $category=($_POST['category']);
        $condition=($_POST['condition']);
        $date=($_POST['date']);
            
              if(empty($_POST['date'])) 
        {
            $dateerr="Date is required";
        }
             if(empty($_POST['isbn'])) 
        {
            $isbnerr="ISBN is required";
        }
            if(empty($_POST['title'])) 
        {
            $titleerr="Title is required";
        }
              
          if(empty($_POST['describe'])) 
        {
            $deserr=" Description is required";
        }
         if(empty($_POST['publisher']))
        {
            $publishererr="Publisher is required";
        }
            if(empty($_POST['pubyear']))
        {
            $pubyearerr="Publisher year is required";
        }
        if(empty($_POST['author']))
        {
            $authorerr="Author is required";
        }
             if(empty($_POST['category']))
        {
            $categoryerr="Category is required";
        }
            
         if(empty($_POST['condition']))
        {
            $conditionerr="Condition is required";
        }
         //text only require letters only 
            if (!preg_match("/^[a-zA-Z ]*$/",$author)) {
  $authorerr = "Only letters is allowed";
   
} 
           
            else  if (($_POST['isbn'])&&($_POST['title'])&&($_POST['describe'])&&($_POST['publisher'])&&($_POST['pubyear'])&&($_POST['author'])&&($_POST['category'])&&($_POST['condition'])&&($_POST['date']))
        {
          
             
                       //update sql command 
    $update=mysqli_query($dbh,"UPDATE `book` SET `isbn`='$isbn',`title`='$title',`description`='$describe',`publisher`='$publisher',`pubyear`='$pubyear',`author`='$author',`category`='$category',`condition1`='$condition',`returndate`='$date',`borrow`='yes' WHERE id='$id'");
        echo '<script type="text/javascript">';
echo 'alert ("Book is borrowed")';
echo '</script>';
      $URL="Booklist2.php";
echo "<script>location.href='$URL'</script>";     
   }
    
        }
          mysqli_close($dbh); //close the database connection  
    if (isset($_POST['cancel'])) //cancel operation
    {
        header("location:Booklist2.php");
    }
?>
    

    
    
<body>
    <form method="POST">
<table align="center">
<caption style="caption-side: top;" ><h4>Borrow Book</h4></caption>
     <tr>
<td>ISBN</td><td><input type="text" name="isbn" placeholder="Enter ISBN" value="<?php echo $check['isbn']; ?>" readonly><br> <span class="error" >* <?php echo $isbnerr;?></span></td>
     </tr> 
    <tr>
    <tr>
<td>Title</td><td><input type="text" name="title" placeholder="Enter Book Title" value="<?php echo $check['title']; ?>" readonly><br> <span class="error">* <?php echo $titleerr;?></span></td>
     </tr> 
     <tr>
<td>Description</td><td><textarea name="describe" rows=8px cols=60px placeholder="Description" readonly><?php echo $check['description']; ?></textarea><br> <span class="error">* <?php echo $deserr;?></span></td>
     </tr>  
    <tr>
<td>Publisher</td><td><input type="text" name="publisher" placeholder="Enter Publisher" value="<?php echo $check['publisher']; ?>" readonly><br> <span class="error" >* <?php echo $publishererr;?></span></td>
     </tr> 
    <tr>
    <td>Publisher Year</td><td><input type="number" name="pubyear" maxlength=4 placeholder="Enter Publisher Year" value="<?php echo $check['pubyear']; ?>" readonly><br> <span class="error">* <?php echo $pubyearerr;?></span></td>
     </tr>  
     <tr>
<td>Author</td><td><input type="text" name="author" placeholder="Enter Author" value="<?php echo $check['author']; ?>" readonly><br> <span class="error" >* <?php echo $authorerr;?></span></td>
     </tr> 
     <tr>
<td>Category</td>
         <td><select name='category' placeholder="Category" readonly> 
           <option readonly><?php echo $check['category']; ?></option>
            <option value="Fiction" readonly>Fiction</option>
            <option value="Non Fiction" readonly>Non Fiction</option>
           </select><br> <span class="error">* <?php echo $categoryerr;?></span></td>  
     </tr>  
    <tr>
<td> Condition</td><td><textarea name="condition" rows=8px cols=60px placeholder="Enter Condition" readonly> <?php echo $check['condition1']; ?></textarea><br> <span class="error">* <?php echo $conditionerr;?></span></td>
     </tr>  
    <tr>
<td>Return Date</td><td><input type="date" name="date" placeholder="Enter Return Date" value="<?php echo $check['returndate']; ?>" ><br> <span class="error" >* <?php echo $dateerr;?></span></td>
     </tr> 
    
       <tr>
<td><input type="submit" name="borrow" value="Borrow"></td>
<td><input type="submit" name="cancel" value="Cancel"></td>
     </tr>  
    </table>
       
        </form>
</body>





<footer >Copyright &copy;2019</footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>