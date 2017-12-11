<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>

		
 <?php
  
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
          
          //$strSQL = "SELECT MAX(id) FROM college";
          
          //$result = $mysqli->query($strSQL);
          //$row = $result->fetch_array();
          //$out=$row['MAX(id)'];
          //$out++;
         // mysqli_close($con);
          
      if(isset($_POST['add']))
      {
        //  $con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

          
          
          
          $id=$_POST['id'];
          $name=$_POST['name'];
         
          //$emp_salary = $_POST['emp_salary'];
          
          $strSQL = "INSERT INTO college (name) VALUES(\"$name\")";
          
          $result = $mysqli->query($strSQL);
          
          if(!$result )
          {
              die('Could not enter data: ' . mysqli_error());
          }
          
          echo "Entered data successfully\n";
          
         // mysqli_close($con);
      }
      else
      {
      ?>
  
<form method="post" action="<?php $_PHP_SELF ?>">
    <table>
        <tr>
            <td>
                id</td>
            <td>
                <input id="txtid" type="text"  name="id" value=" auto inc" 
                   readonly="readonly" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text" name="name" /></td>
            <td>
                &nbsp;</td>
        </tr>
        
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <input id="addcollege" type="submit" value="add college" name="add" /></td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
    <?php
      }
            ?>	<!--end testimonials-->


<?php include'admin_footer.php';?>	

</body>
</html>