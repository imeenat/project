<?php   session_start();
//PHP MAILER ...
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
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
        background-color: lightgreen;
        font-family: sans-serif;
        background-image: linear-gradient(45deg, #fff, dodgerblue);
        width: 100%;
        height: 100vh;
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

<a href="user_dashboard.php">User Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Logout</a>
    <h2>Welcome, <span><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']." "; session_destroy();}?></span>You can now lay your complain.</h2>

    <!-- start -->
    <?php
    include("server.php");
if(isset($_POST["SubmitBtn"])){
    //Complain Section and variables declarations

    $msg=$_POST["msg"];
    $email = $_POST['email'];
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
$message = "Hello Admin, <br> A User had forwarded a complain. The complain is <q>".$msg."</q>. <br><br><br>Thanks,<b>Management</b>";

//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "ssl";
//Port to connect smtp
$mail->Port = "465";
//Set gmail username
$mail->Username = "abubakarbishir081@gmail.com";
//Set gmail password
$mail->Password = "ocpzfpachonmbjts";
//Email subject
$mail->Subject = $subject;
//Set sender email
$mail->setFrom('abubakarbishir081@gmail.com', "User Complain");
//Enable HTML
$mail->isHTML(true);
//Attachment
// $mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = $message;
//Add recipient
$mail->addAddress($email);
//Finally send email
if ( $mail->send() ) {
// $_SESSION['sent'] = $subject2;
}else{
echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}
//Closing smtp connection
$mail->smtpClose();  

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

<form id="emailForm" name="emailForm" method="post" action="complain_form.php" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Lay Your Complain Below</strong></td>
</tr>
<tr>
  <td>E-mail :</td>
  <td><input name="email" type="text" id="email"></td>
</tr>
<tr>
  <td>Complain :</td>
  <td>
  <textarea name="msg" cols="45" rows="5" id="msg"></textarea>
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"></td>
</tr>
</form>

<footer>
  <p>Copyright &copy; <?php echo date("Y"); ?>Department of Computer Science Hassan Usman Katsina Polytechnic.</p>
</footer>
    <!--end  -->
</body>
</html>