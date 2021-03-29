<html>
<div class="webtop"><!--top of every webpage-->
<table style="width:100%; color:darkslategrey;">
    <tr>
        
                                 <!--name of system-->
<td><b style="font-size:18px;color:darkslategrey;">A.B Library Book Management System</b></td> 
 
     <td>
        <ul>
          <li><a href="Home.php">Home</a></li>  
            <li><a>Books</a>
            <ul>
            <li><a href="Booklist2.php">Books On Loan</a></li>
            <li><a href="Booksborrowed.php">Books Borrowed</a></li>
            </ul>
        </li>
            <li><a href="">About</a>
            <li><a>Settings</a>
            <ul>
            <li><a href="">Update Account Details</a></li>
            </ul></li>
        </ul>
        </td>   
        
    
    
     <td><i style="color:darkslategrey;" class="fa fa-user-circle" aria-hidden="true"></i><?php 
    session_start();
    //make connection
      mysql_connect('localhost','root','');
    //selectdb
    mysql_select_db('library');
     $sql="select * from student where id='".$_SESSION['user']."'";
        $records=mysql_query($sql);
   while($info=mysql_fetch_assoc($records))
   {
    
        echo " "."<b>WELCOME,</b>"." ".$info['fname']."";
        echo " "."<b></b>"." ".$info['mname']."";
        echo " "."<b></b>"." ".$info['lname']."";
    }
    ?>
    </td>
        <td>
    <form action="Login.php" method="POST">
        <input type=submit name="logout" value="Log Out">
    </form>
    </td>
     </table>  
    
        
</div>
    
    
   </html> 