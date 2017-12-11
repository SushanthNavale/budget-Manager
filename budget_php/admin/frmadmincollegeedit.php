
<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include'admin_header.php';?>
		


<?php

$id="";
$name="";
$status="";
if($_GET['id']!=null)
{
    $id = intval($_GET['id']);
    //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
    $strSQL = "SELECT * FROM college WHERE id='".$id."'";
    $result = $mysqli->query($strSQL);
    $row = $result->fetch_array();
    
    $id=$row['id'];
    $name=$row['name'];
    //$status=$row['status'];

    
   // mysqli_close($con);
}
?>
    
<html>
<head>
<script>
    function load() {
       <?php 
       echo '
        //document.getElementById("txtid").disabled = true;
        document.getElementById("txtid").value = "'.$id.'";
        document.getElementById("txtname").value = "'.$name.'";
        
        ';
       ?>
      }
       
       </script>

</head>
<body onload="load()">
<?php
if(isset($_POST['update']))
{
    //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

    
    if(! $mysqli )
    {
        die('Could not connect: ' . mysqli_error());
    }
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    
    
    $strSQL = "UPDATE college SET name=\"$name\" WHERE id='$id'";
    
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
                <input id="txtid" type="text" readonly="readonly" value="$id" name="id" /></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                name</td>
            <td>
                <input id="txtname" type="text" value="$name" name="name" /></td>
            <td>
                &nbsp;</td>
        </tr>
       <!-- <tr>
            <td>
                tag</td>
            <td>
                <input id="txtstat" type="text"  name="status" readonly="readonly"/></td>
            <td>
                &nbsp;</td>
        </tr>-->
       
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


        
<?php include'admin_footer.php';?>
</body>
</html>