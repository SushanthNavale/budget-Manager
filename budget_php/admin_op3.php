<?php
session_start();
if (isset($_SESSION['uname']))
{
	?>
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
				 ADMIN 
			<p align="right"><p align="right"> <input type="button" name="edit" value="Signout" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='signout2.php'">&nbsp &nbsp &nbsp <input type="button" name="edit" value="Back" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='admin_op.php'"></p>
			</p>
		</div>
	</div>
</div>
<div class="hr">
</div>
</div>

<!-- CONTENT 
================================================== -->
<form method="POST" action="">
<center>
<table style="background-color:grey" align="center">
<tr>
<td><font size="4" color="maroon"><b>Faculty Name</font><input type="text" name="name" required='true'><input type='submit' name ='sub' value='Delete' style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px"></form></td>
</tr>
</table></center></form>

<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
$sql ="SELECT * from faculty";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
{

echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Name</font></th>";
echo "<th> <font size='3' color='black'>Date Of Birth</font></th>";
echo "<th> <font size='3' color='black'>Contact Number</font></th>";
echo "<th> <font size='3' color='black'>Email ID</font></th>";
while($row = $result->fetch_array())
{
echo "</tr>";
echo" <tr>";
echo"<td font color='black' bgcolor='grey'>".$row['name']."</td>";
echo"<td font color='black' bgcolor='grey'>".$row['dob']."</td>";
echo"<td font color='black' bgcolor='grey'>".$row['contact']."</td>";
echo"<td font color='black' bgcolor='grey'>".$row['email']."</td>";
echo "</tr>";
}
echo "</table>";
}
}
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if(isset($_POST['sub']))
{
if ($mysqli === false)
{
die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['sub']))
{
$name=$_POST['name'];
$sql = "DELETE FROM faculty WHERE name='$name'";
if ($mysqli->query($sql) === TRUE) 
{
echo "<font size='5' color='white'> Record  Successfully Deleted</font>";
} 
else
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
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
	header("Location:admin.php");
?>


