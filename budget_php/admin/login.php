<?php
include '../database.php';
session_start();
$loginerr="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	$myusername=$_POST['username']; 
	$mypassword=$_POST['password']; 
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	
	//$myusername = mysql_real_escape_string($myusername);
	//$mypassword = mysql_real_escape_string($mypassword);
	
	$encpass=md5($mypassword);
	
	$sql="SELECT * FROM admin WHERE username='$myusername' and password='$encpass'";
	if($result = $mysqli->query($sql))
	{
	
		if($result->num_rows==1)
		{
			$_SESSION['authorised']="Registered";
			header("location:admin.php");
		}
		else
		{
			$loginerr="Invalid Username/Password";
		}
	}
}
if(isset($_GET['logout']))
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
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<meta name="viewport" content=�width=device-width, initial-scale=1, maximum-scale=1?>
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="author" content="">
<meta name="classification" content="" />
<meta name="generator" content="" />
<link rel="shortcut icon" href="img/Body Sculpt.png" type="image/png"/>
<link href="../css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/theme.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/docs.css" rel="stylesheet">
<link href="../js/google-code-prettify/prettify.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->      
<style>

</style>
</head>
<body>
<!--Header-->
	<div class="header">
    	
    </div>
	<!--/Header-->
	
<!--Page Container-->
  <div class="page_container">
    	
    	<div class="wrap">
        	<div class="container">
                <section>
                	<div class="row">
                    	
                    	<div class="span8">
                        	<h2 class="title"  style="text-align:center;"><span>Admin Login</span></h2>
                            <div class="contact_form">  
						<div id="note" style="color:red;"> <?php echo $loginerr; ?></div>
							<?php 
														if(isset($_SESSION['authorised'])){ ?>
												<div class="notification_ok"> Already Logged In &nbsp; &nbsp; &nbsp; &nbsp; <a href="admin.php"> Go to Admin Panel  </a> &nbsp; &nbsp; &nbsp; &nbsp; <a href=?logout=yes>  Logout </a>   </div>
								<?php 
														} else { ?>
                                <div id="fields">
                                    <form id="ajax-contact-form" name="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                                      
									   <input class="span7" type="text" name="username" placeholder="UserName" size="15" /> 
										<input class="span7" type="password" name="password" placeholder="Password" size="15"/>
									  
									  <div class="clear"></div>
									  <a href="../index.php"> <input type="button" class="btn send_btn" value=" Go To Home "/>  </a> 
	
                                        <input type="submit" class="btn send_btn" value="Login" />
                                        
                                        <div class="clear"></div>
                                    </form>
                                </div>
								<?php } ?>
                            </div>                   
                        </div>                	
                	</div>
                </section>
            </div>
        </div>
    </div>
	<!--/Page Container-->
	<!--Footer-->
	<div id="footer">
    	<div class="wrap">
    		<div class="container">
            	<div class="row">
                	
                    
                    
                            	
            	</div>
        	</div>            
        </div>
        

    </div>
<!--/Footer-->
</body>
</html>