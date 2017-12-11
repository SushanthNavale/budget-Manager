<?php
session_start();
if(isset($_SESSION['name']))
{
header("Location:staff_op.php");
}
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
<td><font size="5" color="maroon" font="Comic Sans MS ">User Name:</font></td><td><input type="text" name="name" required="true"></td>

<td><font size="5" color="maroon" font="Comic Sans MS ">Password:</font></td><td><input type="password" name="password" required="true"></td></tr>
</table>
<table style="background-color:grey" align="center">
<td><input type="submit" name="sub" value="Sign In" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px"></td>
<td><input type="reset" name="sub" value="Clear" style="font-size:15pt; color:white; background-color:maroon; padding:10px 25px">	
</td></tr>
	</table>
	</form>
	</center>

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
$username=$_POST['name'];
$password=$_POST['password'];
if((!empty($username)) && (!empty($password)) )
{
$sql = "SELECT * from f_login";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
	{
while($row = $result->fetch_array())
	{
		$user=$row['fname']; 
$pass=$row['pass'];
if($username == $user && $password==$pass)
{
$_SESSION['name']=$username;
header("Location: staff_op.php");
}
else 
{
echo("Please Enter Correct Username and Password ...");
header("Location: staff.php");
}
}
}
}
}
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