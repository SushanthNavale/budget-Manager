<?php
session_start();
if (isset($_SESSION['uname']))
{
	?>
<html class="no-js" lang="en">

<head>
<style>

</style>

</head>
<body>
<!-- HIDDEN PANEL 
================================================== -->

<!-- SUBHEADER
================================================== -->
<!-- CONTENT 
================================================== -->
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$sql ="SELECT * FROM fac_bud ORDER BY fac_name";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
{

	echo"<center>";
echo"<font size='6' color='Black'  font-family='Times New Roman'>Ramaiah Institute of Technology, Bangalore – 54";
echo"<br>
<br>";
echo"<font size='5' color='black'  font-family='Times New Roman'>Department of Computer Applications";
echo"<br>
<br>";
echo"<font size='5' color='black'  font-family='Times New Roman'>Budget Proposal for the Financial Year 2016-17";
echo"<br>";
echo"<br>";
echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Faculty Name</font></th>";
echo "<th> <font size='3' color='black'>Financial Year</font></th>";
echo "<th> <font size='3' color='black'>Department Name</font></th>";
echo "<th> <font size='3' color='black'>Budget Proposed</font></th>";

while($row = $result->fetch_array())
{
echo "</tr>";
echo"<tr>";
echo"<td>".$row['fac_name']."</td>";
echo"<td>".$row['finan_year']."</td>";
echo"<td>".$row['dept_name']."</td>";
echo"<td>".$row['budget']."</td>";
echo "</tr>";
}
echo "</table>";
echo"</center>";
}
echo"<br>";
}
if ($result->num_rows > 0)
{
echo"<center>";
echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Total Budget Proposed </font></th>";

echo "</tr>";
echo"<tr>";
while($row = $result->fetch_array())
{
echo"<td>".$row['budget']."</td>";
}
echo "</tr>";
echo "</table>";
echo"</center>";
}
echo"<br>";
echo"<center>";
echo"<font size='4' color='black'  font-family='Times New Roman' >* To keep ISO, NBA, NACC, VTU & Office (Marks Cards, Examination documents) ";
echo"<br>
<br>";
echo"<font size='4' color='black'  font-family='Times New Roman' >** Attending National & International Conferences / Organizing workshops";
echo"</center>";
echo"<br>";
echo"<br>";
echo"<font size='4' color='black'  font-family='Times New Roman' >Head of the Department<br><br>Signature:____________ &nbsp &nbsp &nbsp Seal:____________";

?>

<!-- FOOOTER 
================================================== -->

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
