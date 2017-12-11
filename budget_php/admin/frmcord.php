<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>

<script src="ajfetch.js">
</script>

<div>

<table border="1">
<tr>
	<th>id</th>
    <th>usn</th>
	<th>name</th>
	<th>phone</th>
	<th>email</th>
    <th>event name</th>
    <th>college Name</th>
    <th>Reference</th>
</tr>

<?php
$college_array=array();
$event_array=array();
$course_array=array();/*to check whether MCA and BCA manually update*/
$dummy_array=array();
$dummy_array[0]="MCA";
$dummy_array[1]="BCA";

		 

          $str00 = "SELECT * FROM college";
          $result00= $mysqli->query($str00);

          //$rowcount=$result->num_rows;
          if ($result00->num_rows > 0)
          {
              
              while($row00 = $result00->fetch_array())
              {
                  $college_array[$row00[0]]=$row00[1];
              }
          }
          
          $str01 = "SELECT * FROM events";
          $result01= $mysqli->query($str01);

          //$rowcount=$result->num_rows;
          if ($result01->num_rows > 0)

          {
              
              while($row01 = $result01->fetch_array())
              {
                  $event_array[$row01[0]]=$row01[1];
				  $course_array[$row01[0]]=$dummy_array[$row01["category"]];
				 
              }
          }

          //$eventid=$_GET[""];//later part
          //$count=0;
          //$con = mysqli_connect("localhost","root","","abhyuday") or die("Some error occurred during connection " . mysqli_error($con)); 



          $strSQL = "SELECT * FROM team_head ";
          $result1= $mysqli->query($strSQL);

          //$rowcount=$result->num_rows;
          if ($result1->num_rows > 0)

          {
              
              while($row1 = $result1->fetch_array())
              {
                  $id=$row1['id'];
                  $event_id=$row1['event_id'];
                  
                  
                  //$strSQL1 = "SELECT name FROM student WHERE id='".$student_id."'";
                  //$result1 = $mysqli->query($strSQL1);
                  //$row1 = $result1->fetch_array();
                  $name=$row1['name'];
                  
                  
                  
                  
                  $phone=$row1['phone'];
                  $email=$row1['email'];
                  echo "<tr><td>team<td></tr>";
                  echo "<tr>";
                  echo "<td>$id</td>";
                  echo "<td>$row1[usn]</td>";
                  echo "<td>$name</td>";
                  
                  echo "<td>$phone</td>";
                  echo "<td>$email</td>";
                  echo "<td>".$event_array[$row1["event_id"]]."</td>";
                  echo "<td>".$college_array[$row1["college_id"]]."</td>";
				  echo "<td>".$row1["ref"]."</td>";
				  echo "<td>".$course_array[$row1["event_id"]]."</td>";
				  echo "<td>".$row1["time"]."</td>";
                  //echo '<td><input type="button" value="view" onclick="ajfetch(\'divlist\',\'teamlist.php\','.$eventid.',\'team\','.$id.');" /></td>';
                  echo "</tr>";
                  $strSQL = "SELECT * FROM student WHERE team_head_id=".$id;
                  $result2 = $mysqli->query($strSQL);

                  // $rowcount=$result->num_rows;
                  if ($result2->num_rows > 0)

                  {
                      
                      while($row2 = $result2->fetch_array())
                      {
                          
                          echo "<tr>";
                          echo "<td></td>";
                          echo "<td>$row2[usn]</td>";
                          echo "<td>$row2[name]</td>";
                          
                          echo "<td>$row2[phone]</td>";
                          echo "<td>$row2[email]</td>";
                          echo "<td>".$event_array[$row2["event_id"]]."</td>";
                          echo "<td>".$college_array[$row2["college_id"]]."</td>";
                          echo "</tr>";
                      }
                  }
                  
                  //echo"<tr><td></td>";
                  //echo"";
                  //echo"testing";
				  
              }
          }
          
          //$mysqli->close();
      
?>

<div></div>
</table>
</div>
<div id="divlist">
</div>


<?php include'admin_footer.php'?>


</body>
</html>