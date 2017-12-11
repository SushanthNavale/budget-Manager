<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if($mysqli==false)
	die("ERROR : Failed to create DB ".mysql_connect_error());
$sql ="SELECT Sum(budget) AS Total Budget FROM fac_bud;";
if ($result = $mysqli->query($sql)) 
{
if ($result->num_rows > 0)
{
echo"<center>";
echo "<table border=2px solid black; font size='5' color='black' bgcolor='white'>";
echo "<tr>";
echo "<th> <font size='3' color='black'>Total Budget Proposed </font></th>";

while($row = $result->fetch_array())
{
echo "</tr>";
echo"<tr>";
echo"<td>".$row['budget']."</td>";
echo "</tr>";
}
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
}
?>