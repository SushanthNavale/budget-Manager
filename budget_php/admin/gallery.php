<?php
include '../database.php';
session_start();

if(isset($_GET['action']) && $_GET['action']=="logout")
{
	if(isset($_SESSION['authorised']));
	{
		unset($_SESSION['authorised']);
		session_destroy();
		header("location:login.php");
	}
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width"/>
<title>Abhyuday 2016</title>
<!-- CSS Files-->
<link rel="stylesheet" href="../stylesheets/style.css">
<link rel="stylesheet" href="../stylesheets/homepage.css">
<link rel="stylesheet" href="../stylesheets/skins/teal.css">
<link rel="stylesheet" href="../stylesheets/responsive.css"> 
<script src="ajfetch.js">
</script>
	</head>
	<body>
<div id="panel">
	<div class="row">
		<div class="twelve columns">
			<img src="images/info.png" class="pics" alt="info">
			<div class="infotext">
				Welcome to MSRIT .
			</div>
		</div>
	</div>
</div>
<p class="slide">
	<a href="#" class="btn-slide"></a>
</p>
<!-- HEADER
================================================== -->
<div class="row">	
		<div class="four columns">
			<div class="logo">
				<a href="index.php"><h4>ABHYUDAY 3.0</h4></a>
			</div>
		</div>
		<div class="eight columns noleftmarg">		
			<nav id="nav-wrap">
				<ul class="nav-bar sf-menu">
				
					<li class="current">
					<a href="../index.php">Home</a>
					<!--<ul>
						<li><a href="about.html">About us</a></li>
						</ul>
						<ul>
												
						<li><a href="index2.html">Without slider</a></li>						
						</ul>-->
					</li>
					
					<li><a href="frmadminevent.php"> Events</a>
						<ul>
						<li><a href="portofolio2.html">2 Columns</a></li>
						<!--<li><a href="portofolio3.html">3 Columns</a></li>
						<li><a href="portofolio4.html">4 Columns</a></li>						
						<li><a h
					<a href="ref="portofoliodetail.html">Project Details</a></li>-->
						</ul>-
					</li>
					
					<li>
					<a href="frmadminevent.php">college</a>
						<ul>
						<li><a href="frmadmincollegeadd.php">Add College</a></li>
						
						</ul>
					</li>
					
					<li>
					<a href="frmadmincoordinator.php">Coordinator</a>
						<!--<ul>
						<li><a href="services.html">Services</a></li>						
						</ul>-->
					</li>
					<!--
					<li>
					<a href="#">Downloads</a>
						<ul>
						<li><a href="columns.html">Columns</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="typography.html">Typography</a></li>
						</ul>
					</li>-->
					
					<li>
					<a href="admin_contactus.php">Contact Us</a>
					</li>
					<li>
							<a href=?action=logout>Logout</a>
						</li>
					<!--
					<li>
					<a href="contact.html">Sponsors</a>
					</li>-->
					
				</ul>
				</nav>
		</div>	
</div>


	<div class="hr">
</div>

<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p class="text-center">
				 ADMIN PANEL
			</p>
		</div>
	</div>
</div>

<!-- TESTIMONIALS 
================================================== -->
<div class="row">
	<div class="twelve columns">
<?php
if(isset($_SESSION['authorised']))
{
?>

	
		<div  align="center">
			<h2 style="font-size:18px;color:#256c89;font-weight:normal;padding:0px 0 15px 0;margin:0px 0px 0px 0px;clear:both;">MEMBER DETAILS</h2>
			
			<tr>
		<td><form method="post"  id="search" action="<?php $_SERVER['PHP_SELF']?>">
	<div id="searchbox" align="center">
		<input type="text" size="40" placeholder="Search..." name="word" maxlength="25"/>
	</div>
</form>
		</div><br>



 <div id="conten" align="center">
    <h2 class="title">Member details</h2>
    <table class="TFtable">
    <form name="Image" onReset="formReset()" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<input type="file" class="but" name="Photo" size="2000000" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png" size="26"><br/>
<input type="text" name="name" placeholder="Event Name" /><br />
<input type="text" name="tag" placeholder="tag" /><br />
<input type="submit" class="but" name="Submit" value=" Submit ">
&nbsp;&nbsp;<input class="but" type="reset" name="reset"  value="Reset"></input>
</table>
</form>
  </div>
  <br>
<br>

<br>
<br>
<?php
}
else
{
?>
<h2> Access Denied </h2>
<?php
}
?>
</body>
</html>