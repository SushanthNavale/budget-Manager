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
<center>
<form method="POST" action="">
<table style="background-color:grey" align="center">
<tr>
<td><font size="4" color="Black"><b>Insert Your Photo:</b></font></td><td> <input type="file" name="img"></td>
<td>
<font size="5" color="Black"><b> Name:</b></font></td><td><input type="text" name="name" required="true"></td>
<td>
<font size="5" color="Black"><b>Contact Number:</b></font></td><td><input type="text" name="phno" required="true"></td>
<td>
<font size="5" color="Black"><b>Email ID:</b></font></td><td><input type="text" name="mail" required="true"></td>
</tr>
</table>
<table style="background-color:grey" align="center">
<tr>
<td>	
<input type="submit" name="sub" value="submit" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px">
</td>
<td><input type="reset"  value="Clear" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px">	

</td>
</tr>
</table>
</center>

</table>
</center>

<?php 
if(isset($_POST['sub']))
{
$mysqli= new mysqli("localhost","root","","budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$image=$_POST['img'];
$name=$_POST['name'];
$cnt=$_POST['phno'];
$mail=$_POST['mail'];
$sql = "INSERT INTO admin_detail (img,name,contact,email) VALUES ('$image','$name','$cnt','$mail')";
if ($mysqli->query($sql) === TRUE) 
{
echo "<font size='6' color='black'></font>New record  added successfully";
} 
else
{
echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
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


