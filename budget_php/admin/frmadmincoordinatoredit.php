<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>

<?php

$id="";
$name="";
$tag="";
$description="";
$rules="";
if($_GET['id']!=null)
{
    $id = intval($_GET['id']);
    //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
    $strSQL = "SELECT * FROM coordinator WHERE id='".$id."'";
    $result = $mysqli->query($strSQL);
    $row = $result->fetch_array();
    
    $id=$row['id'];
    $usn=$row['usn'];
    $name=$row['name'];
    $phone=$row['phone'];
    $event_id=$row['event_id'];
    $email=$row['email'];

    
    //mysqli_close($con);
}
?>
    

<?php
if(isset($_POST['update']))
{
    //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

    
  
    $id=$_POST['id'];
    $usn=$_POST['usn'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $event_id=$_POST['event_id'];
    $email=$_POST['email'];

    
    
    $strSQL = "UPDATE coordinator SET usn='$usn',name='$name',phone='$phone',event_id='$event_id',email='$email' WHERE id='$id'";
    
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
                <input id="txtid" type="text" readonly="readonly" value="<?php echo $id; ?>" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                usn</td>
            <td>
                <input id="txtusn" type="text" value="<?php echo $usn; ?>" name="usn" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text" value="<?php echo $name; ?>" name="name" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                phone</td>
            <td>
                <input id="txtphone" type="text" value="<?php echo $phone; ?>" name="phone" /></td>
            <td>
                &nbsp;</td>
        </tr><tr>
            <td>
                event_id</td>
            <td>
                <input id="txtevent_id" type="text" value="<?php echo $event_id; ?>" name="event_id" /></td>
            <td>
                &nbsp;</td>
        </tr><tr>
            <td>
                email</td>
            <td>
                <input id="txtemail" type="text" value="<?php echo $email; ?>" name="email" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <input id="Submit1" type="submit" value="submit" name="update" /></td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form> <?php
}
            ?>

<?php include'admin_footer.php'?>
</body>
</html>