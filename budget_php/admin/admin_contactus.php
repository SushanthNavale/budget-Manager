

<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include'admin_header.php';?>



							


<div class="tests">
<table border="10" cellpadding="5" cellspacing="5" id="t"> 
		<tr><th>ID</th><th>NAME</th><th>EMAIL</th><th>MOBILE</th><th>QUERY</th></tr>
<?php



$sql="select * from contactus ";
if ($result = $mysqli->query($sql)) {
if ($result->num_rows > 0) {
while($row = $result->fetch_array())
{
	$id=$row['id'];
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$query=$row['query'];

	
	
		

	echo "	<tr><td> $id</td><td>$name</td><td>$email</td><td> $mobile</td><td>$query</td></tr>";
		

}
}
}
?>
</table>
	</div>
             

		

<?php include'admin_footer.php';?>





</body>
</html>