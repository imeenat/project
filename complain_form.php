<?php   session_start();
//PHP MAILER ...
//Include required PHPMailer files
require 'includes/phpMailer/PHPMailer.php';
require 'includes/phpMailer/SMTP.php';
require 'includes/phpMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complain Dashboard</title>
    <style>
       body{
        font-family: sans-serif;
        background-image: linear-gradient(45deg, #354649, #A3C6C4);
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }

    a{
            /* position: relative;
            float: right; */
            font-size: 22px;
            text-decoration: none;
            color: #930967;;
            font-weight: bold;
        }
    .con , h2{
      display: flex;
			flex-direction:column;
			align-items: center;
			justify-content: center;
			margin-top:15px;
      color:  #E0E7E9;
      font-weight: bold;
      
      
        }
       
        input{
          padding: 7px;
          width: 330px;
        }

        input[type="submit"]{
          background-color: green;
          color: #fff;
          font-size: 18px;
          font-weight: bold;
          width: 355px;
          padding: 9px;
          border:none;
          border-radius: 7px;
        }

        input[type="submit"]:hover{
          background-color: darkgreen;
          cursor: pointer;
        }
        footer{
          position: absolute;
          bottom: 10px;
        }
   
    </style>
</head>
<body>

<a href="../customer/">User Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout.php">Logout</a>
    <h2>Welcome, <span><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']." "; session_destroy();}?></span>You can now lay your complain.</h2>

    <!-- start -->
    <?php
    include("server.php");
if(isset($_POST["SubmitBtn"])){
    //Complain Section and variables declarations

    $msg=$_POST["msg"];
    $email = $_POST['email'];
    $admin_mail = "imeenat360@gmail.com";
    // $subject = "Contact mail";
    // $from=$_POST["email"];
    // $headers = "From:" . $from."\r\n";
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-type: text/html\r\n";
    // $headers = "From: $from";

    $sql = "INSERT INTO complains (email, complain) VALUES ('$email', '$msg')";
    $result = mysqli_query($conn, $sql);

    if($result){
      $subject = "Complain Received";
// $subject2 = "Registration Successful, A notification message sent to your email.<br>You can now Login.";
$message = "Hello Dear, <br> Your complain <q>".$msg."</q> was forwarded to Admin for quick action. <br><br><br>Thanks,<b><br>Management</b>";
$message2 = "Hello Admin, <br> {$email} has forwarded the complain below: <br> <q>".$msg."</q> for your necessary further action. <br><br><br>Thanks,<b><br>Management</b>";

//Create instance of PHPMailer
$mail = new PHPMailer();
$mail2 = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
$mail2->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
$mail2->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
$mail2->SMTPAuth = true;

//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "ssl";
$mail2->SMTPSecure = "ssl";
//Port to connect smtp
$mail->Port = "465";
$mail2->Port = "465";
//Set gmail username
$mail->Username = "imeenat360@gmail.com";
$mail2->Username = "imeenat360@gmail.com";
//Set gmail password
// $mail->Password = "wjeitzfkfsufrdmc";
// $mail2->Password = "wjeitzfkfsufrdmc";
//Email subject
$mail->Subject = $subject;
$mail2->Subject = $subject;
//Set sender email
$mail->setFrom('imeenat360@gmail.com', "User Complain");
$mail2->setFrom('imeenat360@gmail.com', "User Complain");
//Enable HTML
$mail->isHTML(true);
$mail2->isHTML(true);
//Attachment
// $mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = $message;
$mail2->Body = $message2;
//Add recipient
$mail->addAddress($email);
$mail2->addAddress($admin_mail);
//Finally send email
if ( $mail->send()) {
// $_SESSION['sent'] = $subject2;
}else{
echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}

if ( $mail2->send()) {
// $_SESSION['sent'] = $subject2;
}else{
echo "Message could not be sent. Mailer Error: ".$mail2->ErrorInfo;
}
//Closing smtp connection
$mail->smtpClose();  
$mail2->smtpClose();  

echo "<p style='background-color: azure; color:darkgreen; font-size: 18px; padding:5px;'>Your Complain has been received, a notification Email successfully sent to Admin for Further Action.</p>";

// 

// $_SESSION['sent'] = $subject2; 

    }
}
 
    // if(mail($email,$subject,$msg,$headers)){

    // else{
    // echo "Email Not sent.";

    // }
    


?>
<div class="con">
<form id="emailForm" name="emailForm" method="post" action="complain_form.php" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2" style= text-align:center;><strong>Lay Your Complain Below</strong></td>
</tr>
<tr>
  <td>E-mail :</td>
  <td><input name="email" type="text" id="email" style= border-radius:10px;></td>
</tr>
<tr>
  <td>Complain :</td>
  <td>
  <textarea name="msg" cols="45" rows="5" id="msg" style= border-radius:10px;></textarea>
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</form>
</div>
</div>

<footer>
  <p>Copyright &copy; <?php echo date("Y"); ?>Department of Computing and Information Technology Alqalam University Katsina.</p>
</footer>

    <!--end  -->
</body>
</html>