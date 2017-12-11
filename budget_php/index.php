<?php
include 'database.php';

// close connection

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width"/>
<meta name="keywords" content="MSRIT">
<title>Budget</title>
<!-- CSS Files-->
<link rel="shortcut icon" href="images/msrit.png" type="image/png"/>
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/layout.css">
<link rel="stylesheet" href="stylesheets/menu.css">
<link rel="stylesheet" href="stylesheets/homepage.css">
<link rel="stylesheet" href="stylesheets/skins/teal.css">
<link rel="stylesheet" href="stylesheets/responsive.css">  
<style>
.alclock{
  width: 68%;
  margin-left: auto ;
  margin-right: auto ;
  overflow:hidden;
  min-width:325px;
 
}
.video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;
}

.video-container iframe,
.video-container object,
.video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}


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
<!-- SLIDER 
================================================== -->
<!--<div id="ei-slider" class="ei-slider">
	<ul class="ei-slider-large">
	<?php
	
		$sql = "SELECT name,tag,img FROM frontimg" ;
		if ($result = $mysqli->query($sql)) 
		{
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_array()) 
				{
					$name=$row['name'];
					$tag=$row['tag'];
					echo"<li>";
					echo "<img src='".$row['img']."' alt='image01' class='responsiveslide'></img>";
					echo"<div class='ei-title'><h2>$name</h2> <h3>$tag</h3></div>";
				
					echo "</li>";
				}
			}
		}
		$mysqli->close();
	?>
	</ul>	
</div>
<div class="minipause">
</div>-->

<img src="images/wall.jpg " style="width:100%;height:800px;"></img>
                                <a href="index.php"></a>
	
<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p class="text-center">
                                MASTER OF COMPUTER APPLICATIONS
			</p>
		</div>
	</div>
</div>

<!-- CONTENT 
================================================== -->

	
        
												





<!-- FOOOTER 
================================================== -->

<?php
include 'foot.php';
?>

<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading -->
<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/jquery.easing.1.3.js"></script>
<script src="javascripts/elasticslideshow.js"></script>
 <script src="javascripts/jquery.carouFredSel-6.0.5-packed.js"></script>
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
</body>
</html>