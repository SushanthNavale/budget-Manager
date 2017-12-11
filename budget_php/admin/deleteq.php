
<?php
include '../database.php';
$column=$_GET["column"];
$id = intval($_GET['id']);
$table=$_GET['table'];
//$id=0;$table=""
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

$strSQL = "DELETE FROM $table WHERE id='".$id."'";
if ($mysqli->query($strSQL) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $mysqli->error;
}
$mysqli->close;
?>