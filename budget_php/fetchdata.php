<?php
$column=$_GET['column'];
$id=$_GET['id'];
$table=$_GET['table'];

include 'database.php';
$sql = "SELECT  $column FROM $table WHERE id='$id'";
if ($result = $mysqli->query($sql)) {
if ($result->num_rows > 0) {
$row = $result->fetch_array();
	echo"$row[$column]";


//$result->close();
} else {
echo "No records matching your query were found.";
}
} 
?>