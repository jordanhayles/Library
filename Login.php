<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
  <?php
    session_start(); //session carries user information to other webpages when logged in
    $usererr = $passerr = "";
    $pass=""; $log="";
         $log="";
     $user="root";
   $host="localhost";
   $db="library";
    
    
    if ($_SERVER["REQUEST_METHOD"]=="POST") //Admin and Client Login 
    { 
    mysql_connect($host,$user,$pass);
    mysql_select_db($db);
    if(isset($_POST['user']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $sql="select * from student where id='".$user."'AND pass='".$pass."'"; //selects data entered in the form
            $sql2="select * from librarian where id='".$user."'AND pass='".$pass."'";
         $sql4="select * from librarian where id='".$user."'AND pass='".$pass."'";
        $result=mysql_query($sql2);
        $result2=mysql_query($sql);
        $result3=mysql_query($sql4);
        $sql3="select * from student";
while($row=mysql_fetch_array($result3)) { 
       
        
        //**librarian Login**
        if ($row["admin"]=='no') //if client account is active
    {
        if(mysql_num_rows($result3)==1) //if correct data entered
        {
            $_SESSION['user']=$user;
            header('Location: Home3.php'); //carries user to the location
        }
        else
        {
            $log="Username and Password is incorrect please check again"; //if incorrect data entered
        }
        }
         else if ($row["admin"]=='yes') //**Admin Login**
             {
             if(mysql_num_rows($result)==1) //if correct data entered
        {
            $_SESSION['user']=$user;
            header('Location: Home2.php'); //carries user to the location
        }
        else
        {
            $log="Username and Password is incorrect please check again"; //if incorrect data entered
        }
         }
}
        //**Student Login**
         while($row=mysql_fetch_array($result2)) { 
    if ($row["active"]=='yes') //if client account is active
    {
         
        if(mysql_num_rows($result2)==1)
        {
            $_SESSION['user']=$user;
            header('Location: Home.php');
        }
        else
        {
            $log="Username and Password is incorrect please check again";
        }
    }
             else if ($row["active"]=='no')
             { //if client account is not active
                 echo '<script type="text/javascript">';
echo 'alert ("Your account is suspended. Please contact or visit the IT personnel to re-activate account!")';
echo '</script>';
      $URL="Login.php";
echo "<script>location.href='$URL'</script>";  
             }
         }
        if(empty($_POST["user"])) //if fields are empty
        {
            $usererr="User Name is required";
        }
        if(empty($_POST["pass"]))
        {
            $passerr="Password is required";
        }
        
    }
    
    }
   
    ?>


    
    
<body>
    <?php
 include "View.css"; //Display user information when logged in
?>  

    
   <?php
 include "login.css"; //Display user information when logged in
?>   
    <br><br><br><br><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<table align="center" style="background-color:white;">
<caption style="caption-side: top; background-color:#D6EAF8;" ><h4>User Login</h4></caption>
    <tr>
<td><b>Username/ID</b></td><td><input type="text" name="user" placeholder="Enter Username"><br> <span class="error">* <?php echo $usererr;?></span></td>
     </tr>   
    <tr>
<td> <b>Password</b></td><td><input type="password" name="pass" placeholder="Enter Password"><br> <span class="error">* <?php echo $passerr;?></span></td>
     </tr>  
       <tr>
<td><input type="submit" name="submit" value="Log In" placeholder="Log In"></td>
     </tr>  
     <tr>
<td><a href="Register.php">Create An Account</a> </td>
     </tr>  
    <tr><td><span class="error">* <?php echo $log;?></span></td></tr>
    </table>
    
        </form>
</body>



<br><br><br><br><br><br><br><br><br><br>

<footer ><b>Copyright &copy;2019</b></footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>