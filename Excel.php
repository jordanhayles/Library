 <?php
        include "database.php"; //database connection
    $output='';
    ?>
 <?php
    
         
        $sql="select * from book";
        $result=mysqli_query($dbh,$sql);
        if(mysqli_num_rows($result)>0)
        {
          $output .=  '<table class="t-view">
          <caption>Book List</caption>
          <caption>Book Inventory Report - December 2019</caption>
          <tr>
        <th>ISBN</th>
    <th>Title</th>
    <th>Description</th>
    <th>Publisher</th>
    <th>Publish Year</th>
     <th>Author</th>
      <th>Category</th>
        <th>Conditon</th>
          </tr>
          ';
            while($row=mysqli_fetch_array($result)){
                $output .='
                <tr>
                <td>'.$row['isbn'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.$row['description'].'</td>
                <td>'.$row['publisher'].'</td>
                <td>'.$row['pubyear'].'</td>
                <td>'.$row['author'].'</td>
                <td>'.$row['category'].'</td>
                <td>'.$row['condition1'].'</td>
                </tr>
                ';    
            }
            $output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename=Book Report.xls");
            echo $output;
        }
     
    ?>