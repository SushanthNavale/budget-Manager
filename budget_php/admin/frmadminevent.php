<html>
<!DOCTYPE html>
<?php include'admin_header.php'?>

        <script src="ajfetch.js">
</script>
<script type="text/javascript">
    function show(id) {
        ajfetch('divrule', 'getshow.php', 'rules', 'events', id);
        ajfetch('divdesc', 'getshow.php', 'description', 'events', id);
        ajfetch('divimg', 'getshow.php', 'image', 'events', id);
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        if (document.URL.indexOf("#") == -1) {
            url = document.URL + "#";
            location = "#";
            location.reload(true);
        }
    });
</script>  
<table>
<tr>
	<th>id</th>
	<th>name</th>
	<th>tag</th>
</tr>

<?php
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
    $tag=$row['tag'];
    //$description=$row['description'];
    $rules=$row['rules'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$tag</td>";
    echo '<td><input type="button" onclick="show('.$id.');" value="show" /></td>';
    echo '<td><input type="button" value="edit" onclick="window.open(\'frmadmineventedit.php?id='.$id.'\')" /></td>';
    echo '<td><input type="button" value="delete" onclick="ajfetch(\'divdesc\',\'deleteq.php\',\'dummy\',\'events\','.$id.');" /></td>';
    echo "</tr>";
    }
}
    
//mysqli_close($con); 
?>
</table>
</div>
<div id="divdesc">
</div>

<div id="divrule">
</div>
<div>
<img id="divimg" src="" style="max-width:200px;" alt="image not found" />
</div>
</div>









		<?php include'admin_footer.php';?>
		



</body>
</html>