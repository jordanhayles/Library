<html>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
    <?php 
$email=$address=$title=$department=$insertxt=$user=$fname=$mname=$lname=$pass="";//Variable used for storing form data 
 $emailerr=$addresserr=$depoerr=$titleerr=$usererr=$fnameerr=$mnameerr=$lnameerr=$passerr=""; //Error variables
     include "database.php"; //Connects to mysql database
        if(isset($_POST['add']))
    {
        $id=($_POST['user']);
        $fname=($_POST['fname']);
        $mname=($_POST['mname']);
        $lname=($_POST['lname']);
        $email=($_POST['email']);
  $address=($_POST['address']);
        $pass=($_POST['pass']);
            $department=($_POST['depo']);
              $title=($_POST['title']);
            
            if(empty($_POST['fname'])) 
        {
            $fnameerr="First Name is required";
        }
          if(empty($_POST['mname'])) 
        {
            $mnameerr="Middle Initial is required";
        }
         if(empty($_POST['lname']))
        {
            $lnameerr="Last Name is required";
        }
            if(empty($_POST['email']))
        {
            $emailerr="Email is required";
        }
        if(empty($_POST['address']))
        {
            $addresserr="Address is required";
        }
             if(empty($_POST['title']))
        {
            $titleerr="Title is required";
        }
            if(empty($_POST['depo']))
        {
            $depoerr="Department is required";
        }
         if(empty($_POST['user']))
        {
            $usererr="User Name/ID is required";
        }
         if(empty($_POST['pass']))
        {
            $passerr="Password is required";
        }
            
                  //text only require letters only 
            if (!preg_match("/^[a-zA-Z ]*$/",$fname) or !preg_match("/^[a-zA-Z ]*$/",$lname) or !preg_match("/^[a-zA-Z ]*$/",$mname)) {
  $fnameerr = "Only letters is allowed";
    $lnameerr = "Only letters is allowed";
     $mnameerr = "Only letters is allowed";
} 
           
            else  if (($_POST['user'])&&($_POST['fname'])&&($_POST['mname'])&&($_POST['lname'])&&($_POST['pass'])&&($_POST['depo'])&&($_POST['title'])&&($_POST['address'])&&($_POST['email']))
        {
          
             if ($title=="Student")
                     {
                $sql="insert into student (id,fname,mname,lname,email,address,department,pass,active)values('$id','$fname','$mname','$lname','$email','$address','$department','$pass','yes')";
                     }
           if ($title=="Librarian")
            {
             $sql="insert into librarian (id,fname,mname,lname,email,address,department,pass,admin)values('$id','$fname','$mname','$lname','$email','$address','$department','$pass','no')";
            }
          
       $result = mysqli_query($dbh,$sql); //execute SQL statement 
		
   $insertxt="User record inserted";  
 
   }
     
        
      mysqli_close($dbh); //close the database connection      
    
        }
    ?>
    

   <?php
 include "View.css"; //Display user information when logged in
?>  

    
   <?php
 include "Session2.php"; //Display user information when logged in
?>    
    <br><br>
<body>
    <form action="Adduser.php" method="POST">
<table align="center" style="background-color:white;">
<caption style="caption-side: top; background-color:#D6EAF8;" ><h4>User Information</h4></caption>
    <tr>
        <td> <b>First Name</b></td><td><input type="text" name="fname" placeholder="Enter First Name"><br> <span class="error">* <?php echo $fnameerr;?></span></td>
     </tr> 
     <tr>
<td> <b>Middle Initial</b></td><td><input type="text" name="mname" placeholder="Enter Middle Initial"><br> <span class="error">* <?php echo $mnameerr;?></span></td>
     </tr>  
    <tr>
<td> <b>Last Name</b></td><td><input type="text" name="lname" placeholder="Enter Last Name"><br> <span class="error">* <?php echo $lnameerr;?></span></td>
     </tr>  
     <tr>
<td><b> Email Address</b></td><td><input type="email" name="email" placeholder="Enter Email"><br> <span class="error">* <?php echo $emailerr;?></span></td>
     </tr> 
     <tr>
<td> <b>Address</b></td><td><input type="text" name="address" placeholder="Enter Address"><br> <span class="error">* <?php echo $addresserr;?></span></td>
     </tr>  
 <tr>
<td> <b>Department</b></td> <td><select name='depo' placeholder="Department"  > 
           <option ></option>
            <option value="Computer">Computer</option>
            <option value="Business">Business</option>
         <option value="Library">Library</option>
           </select> <br> <span class="error">* <?php echo $depoerr;?></span></td>  
     </tr>  
     <tr>
<td><b>Title</b></td> <td><select name='title' placeholder="Title"  > 
           <option ></option>
            <option value="Student">Student</option>
            <option value="Librarian">Librarian</option>
           </select> <br> <span class="error">* <?php echo $titleerr;?></span></td>  
     </tr> 
     <tr>
<td> <b>Username/ID</b></td><td><input type="text" name="user" placeholder="Enter Username/ID"> <br> <span class="error">* <?php echo $usererr;?></span></td>
     </tr>  
    <tr>
<td> <b>Password</b></td><td><input type="password" name="pass" placeholder="Enter Password" maxlength="12" pattern=".{6,}" title="Only 6 to 9 characters"><br> <span class="error">* <?php echo $passerr;?></span></td>
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



<br><br>

<footer ><b>Copyright &copy;2019</b></footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>