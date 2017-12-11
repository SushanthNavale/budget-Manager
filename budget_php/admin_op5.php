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


<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$sql ="SELECT fac_bud.fac_name,fac_bud.finan_year,fac_bud.dept_name,fac_bud.budget,bud_con.con_bud,bud_con.details from fac_bud  ,bud_con Where fac_bud.fac_name=bud_con.fac_name";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
{
echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Faculty Name</font></th>";
echo "<th> <font size='3' color='black'>Finanacial Year</font></th>";
echo "<th> <font size='3' color='black'>Department Name</font></th>";
echo "<th> <font size='3' color='black'>Budget Proposed</font></th>";
echo "<th> <font size='3' color='black'>Consumed Budget</font></th>";
echo "<th> <font size='3' color='black'>Details</font></th>";
while($row = $result->fetch_array())
{
echo "</tr>";
echo"<tr>";
echo"<td>".$row['fac_name']."</td>";
echo"<td>".$row['finan_year']."</td>";
echo"<td>".$row['dept_name']."</td>";
echo"<td>".$row['budget']."</td>";
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
	header("Location:admin.php");
?>


