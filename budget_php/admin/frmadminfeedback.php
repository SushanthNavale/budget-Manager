
<html>
<head>
<script src="ajfetch.js">
</script>
<script type="text/javascript">
    function show(id) {
        ajfetch('divfeed', 'getshow.php', 'feedback', 'feedback', id);
       // ajfetch('divdesc', 'getshow.php', 'description', 'events', id);
        //ajfetch('divimg','getshow.php','image','events',id);
    }
</script>
</head>
<body>


<div>

<table>
<tr>
	<th>id</th>
	<th>name</th>
	<th>email</th>
</tr>

<?php
include '../database.php';
//$count=0;
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con)); 


$strSQL = "SELECT * FROM events";
$result = $mysqli->query($strSQL);

$rowcount=$result->num_rows;
if ($result->num_rows > 0)

{
    
    while($row = $result->fetch_array())
    {
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    //$feedback=$row['feedback'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$email</td>";
    echo '<td><input type="button" onclick="show('.$id.');" value="show" /></td>';
    echo '<td><input type="button" value="delete" onclick="ajfetch(\'divdesc\',\'deleteq.php\',\'dummy\',\'feedback\','.$id.');" /></td>';
    echo "</tr>";
    }
}
    
$mysqli->close; 
?>
</table>
</div>
<div id="divfeed">
</div>


</body>
</html>