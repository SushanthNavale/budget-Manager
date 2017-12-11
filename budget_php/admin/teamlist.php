
<?php
include '../database.php';
$eventid=$_GET["column"];
$teamheadid = intval($_GET['id']);
//$table=$_GET['table'];
//$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con));

$strSQL = "SELECT student_id FROM team WHERE event_id='".$eventid."' AND head_id='".$teamheadid."'";
$result = $mysqli->query($strSQL);


$rowcount=$result->num_rows;
if ($result->num_rows > 0)

{
    
    while($row = $result->fetch_array())
    {
        
        $student_id=$row['student_id'];
        
        $strSQL1 = "SELECT name FROM student WHERE id='".$student_id."'";
        $result1 = $mysqli->query($strSQL1);
        $row1 = $result1->fetch_array();
        $name=$row1['name'];
        
        
        
        echo "$name<br/>";
        
        
    }
}
$mysqli->close;
?>