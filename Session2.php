<html>
<div class="webtop"><!--top of every webpage-->
<table style="width:100%; color:darkslategrey;">
    <tr>
        
                                 <!--name of system-->
<td><b style="font-size:18px;color:darkslategrey;">A.B Library Book Management System</b></td> 
 
     <td>
        <ul>
          <li><a href="Home2.php">Home</a></li> 
            <li><a>Users</a>
            <ul>
            <li><a href="Adduser.php">Add User</a></li>
            <li><a href="Studentlist.php">Student List</a></li>
                  <li><a href="Librarianlist.php">Librarian List</a></li>
            </ul>
        </li>
            <li>
            <a>Books</a>
            <ul>
            <li><a href="Addbook.php">Add Book</a></li>
            <li><a href="Booklist.php">List of Books</a></li>
            </ul>
        </li>
            <li><a href="">About</a>
        </ul>
        </td>   
        
    
    
     <td><i style="color:darkslategrey;" class="fa fa-user-circle" aria-hidden="true"></i><?php 
    session_start();
    //make connection
      mysql_connect('localhost','root','');
    //selectdb
    mysql_select_db('library');
     $sql="select * from librarian where id='".$_SESSION['user']."'";
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