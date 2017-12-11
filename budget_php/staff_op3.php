<?php
session_start();
if(isset($_SESSION['name']))
{
	$uname=$_SESSION['name'];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width"/>
<title>BMP</title>
<!-- CSS Files-->
<link rel="shortcut icon" href="images/msrit.png" type="image/png"/>
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/layout.css">
<link rel="stylesheet" href="stylesheets/menu.css">
<link rel="stylesheet" href="stylesheets/homepage.css">
<link rel="stylesheet" href="stylesheets/skins/teal.css">
<link rel="stylesheet" href="stylesheets/responsive.css">   
<style>

</style>

</head>
<body>
<!-- HIDDEN PANEL 
================================================== -->
<?php
include 'head.php';
?>

<div class="clear">
</div>
<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p align="center">
				 STAFF
				  <p align="right"><input type="button" name="edit" value="Signout" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='signout.php'">&nbsp &nbsp &nbsp 
				 <input type="button" name="edit" value="Back" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='staff_op.php'"></p>
			</p>
			</p>
		</div>
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->
<center>
<form method="POST" action="">
<table align="left" style="background-color:grey">
<th><font size="4" color="black"><b>Heads </font></th>
<tr>
<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Permanent Equipment"><font size="4" color="maroon" font="Comic Sans MS " ><b>Permanent Equipment</font></td> 

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Laptops OR Computers"><font size="4" color="maroon"><b>Laptops OR Computers</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="LCD Projectors"><font size="4" color="maroon"><b>LCD Projectors</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Softwares"><font size="4" color="maroon"><b>Softwares</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Furnitures"><font size="4" color="maroon"><b>Furnitures</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Faculty Devlopment Program"><font size="4" color="maroon"><b>Faculty Devlopment Program</font></td>
</tr>
<tr>
<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Workshops And Seminars"><font size="4" color="maroon" font="Comic Sans MS "><b>Workshops And Seminars</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Consumables For Labs"><font size="4" color="maroon"><b>Consumables For Labs</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Consumables For Stationary etc.."><font size="4" color="maroon"><b>Consumables For Stationary etc..</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="R&D Work"><font size="4" color="maroon"><b>R&D Work</font></td>

<td style="background-color:grey"> <input type="checkbox" name="head[]" value="Books For Department Library"><font size="4" color="maroon"><b>Books For Department Library</font></td>
</tr>
<tr><td style="background-color:grey"> <input type="checkbox" name="head[]" value="Any Other Items"><font size="4" color="maroon"><b>Any Other Items</font> <input type="text" name="pur"></td></tr>
</table>


<center>
<form method="POST" action="">
<table style="background-color:grey" align="center">
<tr>
<td><font size="5" color="maroon" font="Comic Sans MS ">Faculty Name:</font></td><td><input type="text" name="fac_name" value="<?php echo@$uname;?>" required="true"></td>

<td><font size="5" color="maroon" font="Comic Sans MS ">Budget Consumed:</font></td><td><input type="text" name="con_bud" required="true"></td>
<td>
	<font size="5" color="maroon"><b>Details :</b></font></td><td> <textarea rows="4" cols="25" name="issue" required="true" >  </textarea>
   </td>
</tr>
</table>
<table style="background-color:grey" align="center">
<tr>
<td><input type="Submit" name="sub" value="Submit" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" ></td>
<td><input type="reset" name="sub" value="Clear" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px">	
</td>
</tr>
</table>
</form>
</center>

<br>
<br>
<br>
<form method="POST" action="">
<center>
<table style="background-color:grey" align="center">
<tr>
<td><font size="3" color="maroon" font="Comic Sans MS "> To Modify Any Value For Proposed Budget</font></td>
</tr>
</table>
<table style="background-color:grey" align="center">
<tr>

<td><font size="4" color="maroon" font="Comic Sans MS ">Faculty Name:</font></td><td><input type="text" name="facname1" value="<?php echo@$uname;?>"required="true"></td>
<td><font size="4" color="maroon" font="Comic Sans MS ">Head:</font></td><td><input type="text" name="head1" required="true"></td>
<td><font size="4" color="maroon" font="Comic Sans MS ">Budget Consumed:</font></td><td><input type="text" name="con_bud1" required="true"></td>
<td>
	<font size="4" color="maroon"><b>Details :</b></font></td><td> <textarea rows="4" cols="25" name="issue1" required="true" >  </textarea>
   </td>
</tr>
</table>

<table style="background-color:grey" align="center">
<tr>
<td><input type="Submit" name="sub1" value="Submit" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" ></td>
<td><input type="reset" name="sub1" value="Clear" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px"></td>
</tr>
</table>
</center>
</form>


<?php 
if(isset($_POST['sub']))
{
$mysqli= new mysqli("localhost","root","","budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$fac_name=$_POST['fac_name'];
$head=implode(',', $_POST['head']);
$bud=$_POST['con_bud'];
$details=$_POST['issue'];
$sql = "INSERT INTO `bud_con`( `fac_name`, `dept_name`, `con_bud`, `details`) VALUES ('$fac_name','$head','$bud','$details')";
if ($mysqli->query($sql) === TRUE) 
{
echo "<font size='7' color='black'></font><b>New record  added successfully";
} 
else
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
}
?>

<?php 
if(isset($_POST['sub1']))
{
$mysqli= new mysqli("localhost","root","","budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$fac_name=$_POST['facname1'];
$bud=$_POST['con_bud1'];
$head=$_POST['head1'];
$issue=$_POST['issue1'];
$sql = "UPDATE `bud_con` SET`fac_name`='$fac_name',`dept_name`='$head',`con_bud`='$bud',`details`='$issue' WHERE fac_name='$fac_name`'";
if ($mysqli->query($sql) === TRUE)
{
echo "<font size='6' color='black'></font>New record Updated successfully";
} 
else
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
}

?>

<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
$sql ="SELECT * from bud_con";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
{

echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Serial Number</font></th>";
echo "<th> <font size='3' color='black'>Faculty Name</font></th>";
echo "<th> <font size='3' color='black'>Department Name</font></th>";
echo "<th> <font size='3' color='black'>Consumed Budget</font></th>";
echo "<th> <font size='3' color='black'>Details</font></th>";
while($row = $result->fetch_array())
{
echo "</tr>";
echo" <tr>";
echo"<td font color='black'>".$row['ID']."</td>";
echo"<td>".$row['fac_name']."</td>";
echo"<td>".$row['dept_name']."</td>";
echo"<td>".$row['con_bud']."</td>";
echo"<td>".$row['details']."</td>";
echo "</tr>";
}
echo "</table>";
}
}
?>
<!-- FOOOTER 
================================================== -->
<?php
include 'foot.php';
?>
<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading -->
<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/jquery.cycle.js"></script>
<script src="javascripts/app.js"></script>
<script src="javascripts/modernizr.foundation.js"></script>
<script src="javascripts/slidepanel.js"></script>
<script src="javascripts/scrolltotop.js"></script>
<script src="javascripts/hoverIntent.js"></script>
<script src="javascripts/superfish.js"></script>
<script src="javascripts/responsivemenu.js"></script>
<script src="javascripts/jquery.tweet.js"></script>
<script src="javascripts/twitterusername.js"></script>
<script src="javascripts/jquery.isotope.min.js"></script>
<script src="javascripts/jquery.prettyPhoto.js"></script>
<script src="javascripts/custom.js"></script>
</body>
</html>
<?php
}
else
	header("Location:staff.php");
?>