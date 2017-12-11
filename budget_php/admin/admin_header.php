<?php
include '../database.php';
session_start();
if(!isset($_SESSION['authorised']))
{
    header("location:login.php");
}

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

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width"/>
<title>Abhyuday 2016</title>
<!-- CSS Files-->
<link rel="stylesheet" href="../stylesheets/style.css">
<link rel="stylesheet" href="../stylesheets/homepage.css">
<link rel="stylesheet" href="../stylesheets/skins/teal.css">
<link rel="stylesheet" href="../stylesheets/responsive.css">   
</head>
<body>
<!-- HIDDEN PANEL 
================================================== -->
<div id="panel">
	<div class="row">
		<div class="twelve columns">
			<img src="../images/info.png" class="pics" alt="info">
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
				<a href="../index.php"><h4>ABHYUDAY 3.0</h4></a>
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
						<li><a href="frmadmineventadd.php">Add Events</a></li>
						<!--<li><a href="portofolio3.html">3 Columns</a></li>
						<li><a href="portofolio4.html">4 Columns</a></li>						
						<li><a h
					<a href="ref="portofoliodetail.html">Project Details</a></li>-->
						</ul>-
					</li>
					
					<li>
					<a href="frmadmincollege.php">college</a>
						<ul>
						<li><a href="frmadmincollegeadd.php">Add College</a></li>
						<!--<li><a href="blogpage2.html">Blog page style 2</a></li>
						<li><a href="blogpage3.html">Blog page style 3</a></li>
						<li><a href="blogsinglepost.html">Single post</a></li>-->
						</ul>
					</li>
					
					<!--<li>
					<a href="frmadmincoordinator.php">Coordinator</a>
						<!--<ul>
						<li><a href="services.html">Services</a></li>						
						</ul>
					</li>-->
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