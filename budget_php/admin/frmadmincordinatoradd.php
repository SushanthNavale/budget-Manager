<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>
<?php
  
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
          
          //$strSQL = "SELECT MAX(id) FROM coordinator";
          
          //$result = $mysqli->query($strSQL);
          //$row = $result->fetch_array();
          //$out=$row['MAX(id)'];
          //$out++;
          //mysqli_close($con);
          
      if(isset($_POST['add']))
      {
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

          
          
          $id=$_POST['id'];
          $usn=$_POST['usn'];
          $name=$_POST['name'];
          $phone=$_POST['phone'];
          $event_id=$_POST['event_id'];
          $email=$_POST['email'];

          $strSQL = "INSERT INTO coordinator ". "(id,usn,name,phone,event_id,email) ". "VALUES('$id','$usn','$name','$phone','$event_id','$email')";
          
          $result = $mysqli->query($strSQL);
          
          if(!$result )
          {
              die('Could not enter data: ' . mysqli_error());
          }
          
          echo "Entered data successfully\n";
          
          //mysqli_close($con);
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
                <input id="txtid" type="text" readonly="readonly" value="auto inc" name="id" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                usn</td>
            <td>
                <input id="txtusn" type="text"  name="usn" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text"  name="name" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                phone</td>
            <td>
                <input id="txtphone" type="text"  name="phone" /></td>
            <td>
                &nbsp;</td>
        </tr><tr>
            <td>
                event_id</td>
            <td>
                <input id="event_id" type="text"  name="event_id" /></td>
            <td>
                &nbsp;</td>
        </tr><tr>
            <td>
                email</td>
            <td>
                <input id="email" type="text"  name="email" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <input id="Submit1" type="submit" value="submit" name="add" /></td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form> <?php
}
            ?>
<?php include'admin_footer.php'?>

</html>