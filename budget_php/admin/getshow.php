
<?php
include '../database.php';
$coulmn=$_GET["column"];
$id = intval($_GET['id']);
$table=$_GET['table'];
//$coulmn='rules';
//$id = 3;
//$table= 'events';
//$id=0;$table=""
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));
//SELECT $coulmn FROM $table WHERE id='".$id."'
$strSQL = "SELECT $coulmn FROM $table WHERE id='".$id."'";
$result = $mysqli->query($strSQL);
$row = $result->fetch_array();
$out=$row[$coulmn];
echo "$out";
$mysqli->close;
?>