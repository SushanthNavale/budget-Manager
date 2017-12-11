<?php
include 'database.php';
$re_register="";
$title="oops";
$message="some thing went wrong please try again";
$verification_link="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    

    $no_of_student=$_POST['max'];
    $flag=TRUE;
    
    
    $strSQL = "SELECT * FROM team_head WHERE usn='$_POST[leaderusn]' AND event_id=".$_POST['events'];
    $result = $mysqli->query($strSQL);
    // $rowcount=$result->num_rows;
    if ($result->num_rows > 0)
    {
        $re_register.=$_POST['leaderusn'];
        $flag=FALSE;
    }
    
    
    for($i=2;$i<=$no_of_student;$i++)
    {
        $usn='usn'.$i;
        $event_id=$_POST['events'];
        
        // $sql=" ('$_POST[$name]','$_POST[$usn]','$_POST[$email]','$_POST[$phone]','$collegeid','$leader_incid',''),";

        $strSQL = "SELECT * FROM student WHERE usn='$_POST[$usn]' AND event_id='$event_id'";
        $sql2="SELECT * FROM team_head WHERE usn='$_POST[$usn]' AND event_id='$event_id'";
        $sql3="SELECT * FROM student WHERE usn='$_POST[leaderusn]' AND event_id=".$_POST['events'];
        
        $result = $mysqli->query($strSQL);
        if ($result->num_rows > 0)
        {
            $re_register.=$_POST[$usn];
            $flag=FALSE;
        }
        
        $result1 = $mysqli->query($sql2);
        if ($result1->num_rows > 0)
        {
            $re_register.=$_POST[$usn];
            $flag=FALSE;
        }
        
        $result2 = $mysqli->query($sql3);
        if ($result2->num_rows > 0)
        {
            $re_register.=$_POST[$usn];
            $flag=FALSE;
        }
        
    }



    if($flag)
    {
        
        $ref="";
        $used = true;
        while($used)
        {
            $string = rand(0, 9999999);
            $string="REF".$string;
            
            
            $sql = "SELECT * FROM team_head WHERE ref='$string'";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0)
            {
                $used=TRUE;
            }
            $ref=$string;
            $used=false;
        }

        //$ref="NA";//REMOVE THIS TO GENERATE REFFERENCE CODE
        $leader_incid="";

        //save data to database if form is submitted

        $leadernm=$_POST['leadernm'];
        $leader_eid=$_POST['leaderid'];
        $leaderno=$_POST['leaderno'];
        $collegeid=$_POST['college'];
        $event_id=$_POST['events'];
        $leader_usn=$_POST['leaderusn'];
        //echo"$leader_eid,$leadernm,$leaderno,$collegeid";
        $sql="INSERT INTO team_head (college_id,phone,email,name,event_id,ref,usn,time) VALUES('$collegeid','$leaderno','$leader_eid','$leadernm','$event_id','$ref','$leader_usn',NULL);";
        
        if($result = $mysqli->query($sql)) {
            
            $leader_incid=$mysqli->insert_id;
            
            // this must be removed later
            $title="data saved";
            $message= "$leader_usn registered successfully please check your mail at ".$_POST['leaderid']." for conformation and verification ";
        }
        else
        {
            $message= "leader data not saved";
        }
        
        
        
        
        $sql="INSERT INTO student (name,usn,email,phone,college_id,team_head_id,event_id,time) VALUES ";
        $miniflag=FALSE;
        for($i=2;$i<=$no_of_student;$i++)
        {
            $usn='usn'.$i;
            $name='name'.$i;
            $email='email'.$i;
            $phone='phone'.$i;
            
            if(trim($_POST[$usn])!="" && trim($_POST[$name])!="")
            {
                $sql.=" ('$_POST[$name]','$_POST[$usn]','$_POST[$email]','$_POST[$phone]','$collegeid','$leader_incid','$event_id',NULL),";
                $miniflag=TRUE;
                
            }
            
            //use implode function to convert to string and save
            
            
            
            
            
            
            
        }
        $sql=substr_replace($sql,"", -1);
        
        if($miniflag)
        {
            if($result = $mysqli->query($sql)) {
                $title="data saved";
                $message= "registration succesfull please check your mail at ".$_POST['leaderid']." for conformation and verification";
            }
            else
            {
                //$title="oops";
                //$message= "something went wrong techinical error please report us";
            }
        }
        
        
        $event_name;
        $sql_e="select name from events where id=$_POST[events]";
        if ($result_e = $mysqli->query($sql_e)) {
            if ($result_e->num_rows > 0) {
                $row_e = $result_e->fetch_array();
                $event_name=$row_e[0];
            }
        }
        
        // get emailid, name, message body
        
        $message_mail="<h2>Dear participant,</h2><br>Congratulations!!!!<p>You have successfully registered for <b>$event_name</b> ,you can avail an \"Early Bird \" offer of Rs.50  by showing your reference code <b>$ref</b> on the day of the event at registration desk.<br>we eagerly wait for your presence.Hope you enjoy your time at MSRIT!!!!</p>";// mail body
        //$message_mail="<h2>Dear participant,</h2><br>Congratulations!!!!<p>You have successfully registered for <b>$event_name</b> .<br>we eagerly wait for your presence . Hope you enjoy your time at MSRIT!!!!</p>";// mail body
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
        $mail->Username   = "msrit.abhyuday@gmail.com"; // Your full Gmail address
        $mail->Password   = "msrit//abhyuday"; // Your Gmail passwordu
        
        // Compose
        $mail->SetFrom("msrit.abhyuday@gmail.com", "ABHYUDAY 4.0");//reply to emailid, name to display near subject
        $mail->AddReplyTo("msrit.abhyuday@gmail.com", "ABHYUDAY 4.0");// user can reply to this e mail
        $mail->Subject = "ABHYUDAY 4.0 @MSRIT";      // Subject (which isn't required)  
        $mail->MsgHTML($message_mail);
        
        // Send To  
        $mail->AddAddress($_POST['leaderid'], $_POST['leadernm']); // person who to send email, his name to display in sent items
        $result = $mail->Send();		// Send!  
        $sent = $result ? 'Successfully Sent!' : 'Sending Failed!';      
        unset($mail);
        if(!empty($sent)) echo $sent;
        
        //mail end
        
        
    }
    else
    {
        $title="oops!";
        $message=$re_register." is already registered for the this event. <br> registration unsuccesfull";
    }
    
}







$link="index.php";

header('Location:message.php?message='.$message.'&title='.$title.'&link='.$link); 
?>