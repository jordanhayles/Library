<html>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
    <?php 
$id=$email=$address=$department=$fname=$mname=$lname=$pass='';//Variable used for storing form data 
 $emailerr=$addresserr=$depoerr=$usererr=$fnameerr=$mnameerr=$lnameerr=$passerr=''; //Error variables
     include "database.php"; //Connects to mysql database
    $count=$_GET['count'];
    $sql="select * from student where count='$count'"; //show client record
     $result=mysqli_query($dbh,$sql);
    $check=mysqli_fetch_array($result);
        if(isset($_POST['update']))
    {
        $id=($_POST['user']);
        $fname=($_POST['fname']);
        $mname=($_POST['mname']);
        $lname=($_POST['lname']);
        $email=($_POST['email']);
  $address=($_POST['address']);
        $pass=($_POST['pass']);
            $department=($_POST['depo']);
            
            
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
           
            else  if (($_POST['user'])&&($_POST['fname'])&&($_POST['mname'])&&($_POST['lname'])&&($_POST['pass'])&&($_POST['depo'])&&($_POST['address'])&&($_POST['email']))
        {
          
            //update sql command 
    $update=mysqli_query($dbh,"UPDATE `student` SET `id`='$id',`fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`email`='$email',`address`='$address',`department`='$department',`pass`='$pass' WHERE `count`='$count'");
        echo '<script type="text/javascript">';
echo 'alert ("Record updated!")';
echo '</script>';
      $URL="Studentlist.php";
echo "<script>location.href='$URL'</script>";      
                
   }     
        }
      mysqli_close($dbh); //close the database connection 
     
    if (isset($_POST['cancel'])) //cancel operation
    {
        header("location:Studentlist.php");
    }
    
    ?>
    
   
   

    
    
<body>
    <form method="POST">
<table align="center">
<caption style="caption-side: top;" ><h4>User Information</h4></caption>
    <tr>
<td> First Name</td><td><input type="text" name="fname" placeholder="Enter First Name" value="<?php echo $check['fname']; ?>"><br> <span class="error">* <?php echo $fnameerr;?></span></td>
     </tr> 
     <tr>
<td> Middle Initial</td><td><input type="text" name="mname" placeholder="Enter Middle Initial" value="<?php echo $check['mname']; ?>"><br> <span class="error">* <?php echo $mnameerr;?></span></td>
     </tr>  
    <tr>
<td> Last Name</td><td><input type="text" name="lname" placeholder="Enter Last Name" value="<?php echo $check['lname']; ?>"><br> <span class="error">* <?php echo $lnameerr;?></span></td>
     </tr>  
     <tr>
<td> Email Address</td><td><input type="email" name="email" placeholder="Enter Email" value="<?php echo $check['email']; ?>"><br> <span class="error">* <?php echo $emailerr;?></span></td>
     </tr> 
     <tr>
<td> Address</td><td><input type="text" name="address" placeholder="Enter Address" value="<?php echo $check['address']; ?>"><br> <span class="error">* <?php echo $addresserr;?></span></td>
     </tr>  
 <tr>
<td> Department</td> <td><select name='depo' placeholder="Department"  > 
           <option ><?php echo $check['department']; ?></option>
            <option value="Computer">Computer</option>
            <option value="Business">Business</option>
         <option value="Library">Library</option>
           </select> <br> <span class="error">* <?php echo $depoerr;?></span></td>  
     </tr>  
     <tr>
<td> Username/ID</td><td><input type="text" name="user" placeholder="Enter Username/ID" value="<?php echo $check['id']; ?>"> <br> <span class="error">* <?php echo $usererr;?></span></td>
     </tr>  
    <tr>
<td> Password</td><td><input type="password" name="pass" placeholder="Enter Password" maxlength="12" pattern=".{6,}" title="Only 6 to 9 characters" value="<?php echo $check['pass']; ?>"><br> <span class="error">* <?php echo $passerr;?></span></td>
     </tr>  
       <tr>
<td><input type="submit" name="update" value="Update"></td>
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