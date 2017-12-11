<?php include "../database.php";
      
?>
<html>
<head>
    <script src="ajfetch.js">
    </script>
</head>
<body>
    <div>
    </div>
    <div>
        <?php if($_POST[submit])
              { ?>
        <table border="1">
            <tr>
                <th>
                    id
                </th>
                <th>
                    usn
                </th>
                <th>
                    name
                </th>
                <th>
                    phone
                </th>
                <th>
                    email
                </th>
                <th>
                    event name
                </th>
                <th>
                    college Name
                </th>
                <th>
                    Reference
                </th>
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


                  $strSQL = "SELECT * FROM team_head WHERE event_id='".$_POST['events'][0]."' OR event_id='".$_POST['events'][1]."' OR college_id='".$_POST['college']."'";
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
                                  //echo "<td>".$event_array[$row2["event_id"]]."</td>";
                                  //echo "<td>".$college_array[$row2["college_id"]]."</td>";
                                  echo "</tr>";
                              }
                          }
                          
                          //echo"<tr><td></td>";
                          //echo"";
                          //echo"testing";
                      }
                  }
                  
                  //$mysqli->close();
              }
            ?>
        </table>
    </div>
    <div>
        <form method=post action=<?php $_SERVER['PHP_SELF']?> >
        <table>
            <tr>
                <td>
                    college
                </td>
                <td>
                    <?php

                    $sql2 = "SELECT  * FROM college";
                    if ($result2 = $mysqli->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            echo "<select requred name='college'>";
                            echo "<option value=''>select</option>";
                            while($row = $result2->fetch_array()) {

                                echo "<option value='".$row['id'] . "'>" . $row['name'] . "</option>";

                            }
                            echo "</select>";
                            $result2->close();
                        } else {
                            echo "No records matching your query were found.";
                        }
                    }
                    // close connection
                    //$mysqli->close();
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    MCA event
                </td>
                <td>
                    <?php
                    $sql="SELECT * FROM events WHERE category=0";

                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0)

                    {
                        echo "<select name='events[]'  onchange='textdisp(this.value);' requred>";
                        echo "<option value=''>select</option>";
                        while($row = $result->fetch_array()) {        
                            echo "<option value='".$row['id'] . "'>" . $row['name'] . "</option>";
                        }
                        echo "</select>";
                        
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    BCA event
                </td>
                <td>
                    <?php
                    $sql="SELECT * FROM events WHERE category=1";

                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0)

                    {
                        echo "<select name='events[]'  onchange='textdisp(this.value);' requred>";
                        echo "<option value=''>select</option>";
                        while($row = $result->fetch_array()) {        
                            echo "<option value='".$row['id'] . "'>" . $row['name'] . "</option>";
                        }
                        echo "</select>";
                        
                    }
                    ?>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="submit" />
        </form>
    </div>
    <div id="divlist">
    </div>
</body>
</html>
