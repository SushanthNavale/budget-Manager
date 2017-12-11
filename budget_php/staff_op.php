<?php
session_start();
if (isset($_SESSION['name']))
{
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
				 <p align="right"> <input type="button" name="edit" value="Signout" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='signout.php'"></p>
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
<table style="background-color:grey" align="center">
<tr>
<td><input type="button" name="per_det" value="Personal Details" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='staff_op2.php'"></td>
<td><input type="button" name="add_bud" value="Add Budget" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px"onclick="document.location.href='staff_op1.php'"></td>
<td><input type="button" name="con_bud" value="Consumed Budget" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='staff_op3.php'" ></td>
<td><input type="button" name="con_bud" value="Faculty Report" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px" onclick="document.location.href='pdf.php'" ></td>
</tr>
</table>
</center>
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