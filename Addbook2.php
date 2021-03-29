<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
<?php
    
    $isbn=$insertxt=$title=$describe=$publisher=$pubyear=$author=$category=$condition="";//Variable used for storing form data 
 $isbnerr=$titleerr=$deserr=$publishererr=$pubyearerr=$authorerr=$categoryerr=$conditionerr=""; //Error variables
     include "database.php"; //Connects to mysql database
        if(isset($_POST['add']))
    {
        $isbn=($_POST['isbn']);
        $title=($_POST['title']);
        $describe=($_POST['describe']);
        $publisher=($_POST['publisher']);
        $pubyear=($_POST['pubyear']);
        $author=($_POST['author']);
  $category=($_POST['category']);
            $condition=($_POST['condition']);
            
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
           
            else  if (($_POST['isbn'])&&($_POST['title'])&&($_POST['describe'])&&($_POST['publisher'])&&($_POST['pubyear'])&&($_POST['author'])&&($_POST['category'])&&($_POST['condition']))
        {
          
             
                     
                $sql="insert into book (isbn,title,description,publisher,pubyear,author,category,condition1,borrow)values('$isbn','$title','$describe','$publisher','$pubyear','$author','$category','$condition','no')";
                     
          
            
       $result = mysqli_query($dbh,$sql); //execute SQL statement 
		
   $insertxt="Book record inserted";  
 
   }
     
        
      mysqli_close($dbh); //close the database connection      
    
        }
?>
    
   <?php
 include "View.css"; //Display user information when logged in
?>  

    
   <?php
 include "Session3.php"; //Display user information when logged in
?>   
    
    
<body>
    <form action="Addbook2.php" method="POST">
        <br>
        <br>
<table align="center" style="background-color:white;">
<caption style="caption-side: top; background-color:#D6EAF8;" ><h4>Book Information</h4></caption>
     <tr>
<td><b>ISBN</b></td><td><input type="text" name="isbn" placeholder="Enter ISBN"><br> <span class="error">* <?php echo $isbnerr;?></span></td>
     </tr> 
    <tr>
<td><b>Title</b></td><td><input type="text" name="title" placeholder="Enter Book Title"><br> <span class="error">* <?php echo $titleerr;?></span></td>
     </tr> 
     <tr>
<td><b>Description</b></td><td><textarea name="describe" rows=8px cols=60px placeholder="Description"></textarea><br> <span class="error">* <?php echo $deserr;?></span></td>
     </tr>  
    <tr>
<td><b>Publisher</b></td><td><input type="text" name="publisher" placeholder="Enter Publisher"><br> <span class="error">* <?php echo $publishererr;?></span></td>
     </tr> 
    <tr>
    <td><b>Publisher Year</b></td><td><input type="number" name="pubyear" maxlength=4 placeholder="Enter Publisher Year"><br> <span class="error">* <?php echo $pubyearerr;?></span></td>
     </tr>  
     <tr>
<td><b>Author</b></td><td><input type="text" name="author" placeholder="Enter Author"><br> <span class="error">* <?php echo $authorerr;?></span></td>
     </tr> 
     <tr>
<td><b>Category</b></td>
         <td><select name='category' placeholder="Category"  > 
           <option ></option>
            <option value="Fiction">Fiction</option>
            <option value="Non Fiction">Non Fiction</option>
           </select><br> <span class="error">* <?php echo $categoryerr;?></span></td>  
     </tr>  
    <tr>
<td> <b>Condition</b></td><td><textarea name="condition" rows=8px cols=60px placeholder="Enter Condition"></textarea><br> <span class="error">* <?php echo $conditionerr;?></span></td>
     </tr>  
       <tr>
<td><input type="submit" name="add" value="Add"></td>
<td><input type="submit" name="clear" value="Clear"></td>
     </tr>  
    <tr>
      <td>  <span class="error" style="background-color:white;"> <?php echo $insertxt;?></span></td>
    </tr>
    </table>
         
        </form>
</body>



<br>

<footer ><b>Copyright &copy;2019</b></footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>