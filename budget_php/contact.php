<?php
// attempt database connection
include 'database.php';
$nmerr=$cnmerr=$emerr=$mnoerr=$msgerr="";
$ver1=1;
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
	{ 
		$nmerr="*";
		$ver1=0;
	}
	else
    {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$nmerr="*";
			$ver1=0;
		}
    }
	
	if (empty($_POST["clgnm"]))
	{ 
		$cnmerr="*";
		$ver1=0;
	}
	else
    {
		$clgnm = test_input($_POST["clgnm"]);
		if (!preg_match("/^[a-zA-Z,. ]*$/",$clgnm))
		{
			$cnmerr="*";
			$ver1=0;
		}
    }
	
	if (empty($_POST["email"]))
	{ 
		$emerr="*";
		$ver1=0;
	}
	else
    {
		$email = test_input($_POST["email"]);
		 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{
			$emerr="*";
			$ver1=0;
		}
    }
	
	if (empty($_POST["num"]))
	{ 
		$mnoerr="*";
		$ver1=0;
	}
	else
    {
		$num = test_input($_POST["num"]);
		if (strlen($num)!=10)
			{
				$mnoerr="*";
				$ver1=0;
			}
    }
	if(empty($_POST["message"]))
	{ 
		$msgerr="*";
		$ver1=0;
	}
	else
    {
		$message = test_input($_POST["message"]);
		if (strlen($message)<2)
		{
			$msgerr="*";
			$ver1=0;
		}
    }
	
	if($ver1==1)
	{
		$mysqli = new mysqli("localhost", "root", "", "abhyuday");	
        $sql="INSERT INTO contactus (name,college name,email,mobile,query,time) VALUES('','".$_POST['name']."','".$_POST['clgnm']."','".$_POST['email']."','".$_POST['num']."','".$_POST['message']."',NULL);";
if ($result = $mysqli->query($sql)) {
    
    
    
    
    // get emailid, name, message body
    
    $message_mail="Thank you for contacting us, you will get reply from us. <br>You can always contact us at <br> Name-1 +91-8095691761 <br> Name-2 +91-8971056407 <br> Name-3 +91-7348832662 <br> Name-4 +91-9663023543";// mail body
    require "class.phpmailer.php"; //include phpmailer class
    
    // Instantiate Class  
    $mail = new PHPMailer();  
    
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 465;  //Gmail SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "deptmcamsrit@gmail.com"; // Your full Gmail address
    $mail->Password   = "mcamsrit"; // Your Gmail passwordu
    
    // Compose
    $mail->SetFrom("deptmcamsrit@gmail.com", "Ramaiah Institute Of Technology");//reply to emailid, name to display near subject
    $mail->AddReplyTo("deptmcamsrit@gmail.com", "Ramaiah Institute Of Technology");// user can reply to this e mail
    $mail->Subject = "Budget";      // Subject (which isn't required)  
    $mail->MsgHTML($message_mail);
    
    // Send To  
    $mail->AddAddress($_POST["email"], $_POST["name"]); // person who to send email, his name to display in sent items
    $result = $mail->Send();		// Send!  
	$sent = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);
    if(!empty($sent)) echo $sent;
    
    //mail end
    
    
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Your query sent, you will be contacted soon.'); </script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=contact.php\">";
		}
		else
		{
			echo "\n<script language=\"javascript\" type=\"text/javascript\">alert('Error while submission !'.mysql_error());</script>";
				
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=contact.php\">";
		}
		
} else {
echo "ERROR: Could not execute $sql. " . $mysqli->error;
}
}
// close connection
$mysqli->close();
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
<script language="javascript" type="text/javascript">
<!--
	function validateForm(x)
	{	
		var letters = /[A-Za-z -']$/;  
		if(x==1)	
		{
			document.getElementById("nm").style.opacity="1";
			if(letters.test(contact.name.value)) { document.getElementById("nm").src="valid.png"; }
			else { document.getElementById("nm").src="invalid.jpg";	 return false; }
		}
		
		if(x==2)	
		{
			document.getElementById("clg").style.opacity="1";
			if(letters.test(contact.clgnm.value)) { document.getElementById("clg").src="valid.png"; }		
			else { document.getElementById("clg").src="invalid.jpg"; return false; }
		}
		if(x==3)	
		{
			document.getElementById("em").style.opacity="1";
			var x=document.forms["contact"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) { document.getElementById("em").src="invalid.jpg"; }
			else { document.getElementById("em").src="valid.png"; }
		}
		if(x==4)
		{
			document.getElementById("no").style.opacity="1";
			var lnth=parseInt(contact.num.value.length);
			if(lnth!=10 || contact.num.value=="" ||(isNaN(contact.num.value)) ) { document.getElementById("no").src="invalid.jpg"; }
			else { document.getElementById("no").src="valid.png"; }
		}
		if(x==5)
		{
			
			document.getElementById("msg").style.opacity="1";
			if(contact.message.value!="" && contact.message.value.length>2) { document.getElementById("msg").src="valid.png"; }
			else { document.getElementById("msg").src="invalid.jpg"; }
		}
		
	}
	


	/*This function is used to reset the all the input fields in the form*/
	function formReset()
	{
		window.event.returnValue=false;
		if(confirm("Are you sure want to clear the fields?"))
		{
			document.getElementById("nm").src="blank.png";
			document.getElementById("clg").src="blank.png";
			document.getElementById("em").src="blank.png";
			document.getElementById("no").src="blank.png";
			document.getElementById("msg").src="blank.png";
			var1=0;
			var2=0
			var3=0;
			var4=0;
			var5=0;
			window.event.returnValue=true;
		
		}
	}
//-->
</script>
<style>
img
{
	width:22px;
	height:22px;
	border:none;
	
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
<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p align="center">
				 CONTACT US
			</p>
			
		</div>
	</div>
</div>
<div class="hr">
</div>
<!-- CONTENT 
================================================== -->
<div class="row">
    <!-- GOOGLE MAP IFRAME -->
	<div class="twelve columns">
		<iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.2593281586724!2d77.56339794382447!3d13.031891427425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17dedd4dcca9%3A0x6075bd8d8aed97ab!2sM.S.+Ramaiah+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1447549999947"   allowfullscreen>
		</iframe>
	</div>
</div>
<div class="row" >
	<!-- CONTACT FORM -->
	<div class="twelve columns" >
		<div class="wrapcontact" >
			<h5>SEND US A MESSAGE</h5>
			<div class="done">
				<div class="alert-box success">
				 Message has been sent! <a href="" class="close">x</a>
				</div>
			</div>
			<div class="six columns category onstage">			
			<form name="contact" onReset="formReset()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<table >
				<tr> 
					<td >NAME </td> 
					<td> <input type="text" class="inp" name="name" id = "x" onblur="validateForm(1)"> </td>
					<td style="color:red;">  <?php echo $nmerr; ?> </td>
					<td> <img src="blank.png" id="nm"/></td> 
				</tr>

				<tr> 
					<td >EMAIL </td> 
					<td > <input type="text"  class="inp" name="email" onblur="validateForm(3)"></td>
					<td style="color:red;">  <?php echo $emerr; ?> </td>
					<td><img src="blank.png" id="em"/></td> 
				</tr>

				<tr> 
					<td >MOBILE NO. </td> 
					<td> <input type="text" class="inp" name="num" onblur="validateForm(4)"></td> 
					<td style="color:red;">  <?php echo $mnoerr; ?> </td>
					<td><img src="blank.png" id="no"/></td>
				</tr>

				<tr> 
					<td >Query </td> 
					<td> <textarea  class="inp2" name="message" onblur="validateForm(5)">  </textarea> </td> 
					<td style="color:red;"> <?php echo $msgerr; ?> </td>
					<td><img src="blank.png" id="msg"/></td>
				</tr>
				<tr> 
					<td> &nbsp; </td> 
					<td > 
						<input type="reset" value ="RESET" class="btn"/> 
						<input type="submit" value="SEND" class="btn"/>
					</td> 
				</tr>
			</table>
			</form>	
		</div>	
		
		
				
	<div class="six columns category offstage">
							

		<table id="details">
		<tr>
			<th colspan="2">ADMIN</th>
		</tr>
		<tr>
			<td>NAME : </td>
			<td>SUPERMAN</td>
		</tr>
                <tr>
			<td>Phone : </td>
			<td>+91-9900 00000</td>
		</tr>
		<tr>
			<td>E-mail : </td>
			<td>superman@gmail.com</td>
		</tr>		
	</table>
		
		<table id="details">
		<tr>
			<th colspan="2">ADMIN</th>
		</tr>
		<tr>
			<td>NAME : </td>
			<td>SUSHANTH</td>
		</tr>
                <tr>
			<td>Phone : </td>
			<td>+91-9900 00000</td>
		</tr>
		<tr>
			<td>E-mail : </td>
			<td>batman@gmail.com</td>
		</tr>		
	</table>	
				

 	</div>
</div>


</div>	
	
	
			
</div>
<div class="hr">
</div>
<!-- FOOOTER 
================================================== -->
<?php
include 'foot.php';
?>
<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading -->
<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/formvalidation.js"></script>
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