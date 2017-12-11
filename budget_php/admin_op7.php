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
<table style="background-color:grey">

    <tr><td style="background-color:grey"><input type="checkbox" id="select_all" name="m[]" value="navale1994@gmail,supreethshinde64@gmail,chethu4u@gmail"> <font size="4" color="maroon" font="Comic Sans MS " >Select all</font></td></tr>
    <tr><td style="background-color:grey"><input type="checkbox" class="checkbox" id="select_all" name="m[]" value="navale1994@gmail.com"/> <font size="4" color="maroon" font="Comic Sans MS " >Sushanth S Navale</font></tr></td>
   <tr><td style="background-color:grey"> <input type="checkbox" class="checkbox" id="select_all" name="m[]" value="supreethshinde64@gmail.com"/><font size="4" color="maroon" font="Comic Sans MS " >Supreeth Shinde </font></tr></td>
  <tr><td style="background-color:grey"> <input type="checkbox" class="checkbox" id="select_all" name="m[]" value="chethu4u@gmail.com"/><font size="4" color="maroon" font="Comic Sans MS " >Chethan Venkatesh</font></tr></td>
  <td> <font size='4' color='maroon'><b>Enter Subject </font></td><td><input type='text' name ='subject'  required='true'></td> <td><font size='4' color='maroon'><b>Enter Message </font></td><td><input type='text' name ='msg'  required='true'></td><td><input type='submit' name ='sub1' value='Send Reminder' style='font-size:10pt; color:white; background-color:maroon; padding:10px 15px'></td> 
<table>
</center>
</form>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });   
});
    function selectAll() 
    { 
        selectBox = document.getElementById("select_all");

        for (var i = 0; i < selectBox.options.length; i++) 
        { 
             selectBox.options[i].selected = true; 
        } 
    }
</script>

<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if(isset($_POST["sub1"]))
{
	{
if ($mysqli === false)
{
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sub=$_POST['subject'];
$msg=$_POST['msg'];
foreach ($_POST['m'] as $item)
    {
    $email=$item;
	}
				require('C:\xampp\htdocs\budget_php\phpmailer\PHPMailerAutoload.php'); //Set the path of  PHPMailerAutoload.php - It is the path where you have extracted the PHPMailer zip file

				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;           	                    // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'deptmcamsrit@gmail.com';                 // SMTP username - Set your mail id here
				$mail->Password = 'mcamsrit';                           // SMTP password - Set your password here
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom('navale1994@gmail.com', 'Ramaih Institute Of Technology'); // Here you will set the From mail id and subject
				$mail->addAddress($email);     // Add a recipient - This is the mail id to whom you want to send the mail
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = $sub;
				$mail->Body = $msg;

				if(!$mail->send())      //Sending the mail and displaying the message if the mail has been sent
				{
					echo "<font size='5' color='white'>Mail not sent successfully";
				}
				else
				{
					echo "<font size='5' color='white'>Mail sent successfully";
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
<?php
}
else
	header("Location:admin.php");
?>


