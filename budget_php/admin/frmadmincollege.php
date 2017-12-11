<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>
<script src="ajfetch.js">
</script>
		<div>

<table>
<tr>
	<th>id</th>
	<th>name</th>
	<!--<th>status</th>-->
</tr>

<?php
//$count=0;
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con)); 


$strSQL = "SELECT * FROM college";
$result = $mysqli->query($strSQL);

$rowcount=$result->num_rows;
if ($result->num_rows > 0)

{
 
    
    while($row = $result->fetch_array())
    {
        $id=$row['id'];
        $name=$row['name'];
        $status=$row['status'];
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        //echo "<td>$status</td>";
        //if($status)
        //{
        //    echo "<td>registered</td>";   
        //}
        //else{
        //    echo "<td>unregistered</td>";  
        //}
        
        echo '<td><input type="button" value="edit" onclick="window.open(\'frmadmincollegeedit.php?id='.$id.'\')" /></td>';
        echo '<td><input type="button" value="delete" onclick="ajfetch(\'divshow\',\'deleteq.php\',\'dummy\',\'college\','.$id.')" /></td>';
        echo "</tr>";
    }
}

$mysqli->close();
?>
</table>
</div>
<div id="divshow">
</div>

<?php include'admin_footer.php';?>


</body>
</html>