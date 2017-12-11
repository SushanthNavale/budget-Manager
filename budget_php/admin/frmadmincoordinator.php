<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>


<div id="divshow">
</div>

<div>

<table>
<tr>
	<th>id</th>
	<th>usn</th>
	<th>name</th>
    <th>phone</th>
	<th>event_id</th>
	<th>email</th>
</tr>

<?php
$count=0;
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con)); 


$strSQL = "SELECT * FROM coordinator";
$result = $mysqli->query($strSQL);

$rowcount=$result->num_rows;
if ($result->num_rows > 0)

{

    while($row = $result->fetch_array())
    {
    $id=$row['id'];
    $usn=$row['usn'];
    $name=$row['name'];
    $phone=$row['phone'];
    $event_id=$row['event_id'];
    $email=$row['email'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$usn</td>";
    echo "<td>$name</td>";
    echo "<td>$phone</td>";
    echo "<td>$event_id</td>";
    echo "<td>$email</td>";
    echo '<td><input type="button" value="edit" onclick="window.open(\'frmadmincoordinatoredit.php?id='.$id.'\')" /></td>';
    echo '<td><input type="button" value="delete" onclick="ajfetch(\'divshow\',\'deleteq.php\',\'dummy\',\'coordinator\','.$id.');" /></td>';
    echo "</tr>";
    }
}
    
mysqli_close($con); 
?>
</table>
</div>

<?php include'admin_footer.php'?>
</body>
</html>