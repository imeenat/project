<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        .container{
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            font-size: 18px;
        }
input, button{
    padding: 10px;
    margin-top: 5px;
  
}

button{
    width: 100%;
    background-color: green;
    border-radius: 5px;
    color: white;
    font-size: 14px;
    font-weight: bold;
}

    </style>
</head>
<body>
    <a href="user_dashboard.php" style="font-size: 30px;">Back to Dashboard</a>
    <div class="container">
        <?php
        session_start();
        //PHP MAILER ...
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "server.php";

            if(isset($_SESSION['amount'])){
                //session_start();
               
                $amount = $_SESSION['amount'];
                get_user();
          
            if(isset($_POST['btn_pay'])){
                 $code = $_SESSION['otp'];
                  $email = $_SESSION['email'];
                  $query = "SELECT * FROM users WHERE email='$email'";
                  $res =  mysqli_query($conn, $query);
                  $row = mysqli_fetch_assoc($res);
                  $_SESSION['old_bal'] = $row['balance'];
                // $subject = "Contact mail";
                // $from=$_POST["email"];
                // $headers = "From:" . $from."\r\n";
                // $headers .= "MIME-Version: 1.0\r\n";
                // $headers .= "Content-type: text/html\r\n";
                // $headers = "From: $from";
            
                // $sql = "INSERT INTO complains (email, complain) VALUES ('$email', '$msg')";
                // $result = mysqli_query($conn, $sql);
            
                if(isset($_SESSION['otp'])){
                  $subject = "OTP Token";
            // $subject2 = "Registration Successful, A notification message sent to your email.<br>You can now Login.";
            $message = "Hello User, <br> Your OTP Code is: <q><b>".$code."</b></q>. <br><br><br>Thanks,<b>Management</b>";
            
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
            $mail->Username = "imeenat360@gmail.com";
            //Set gmail password
            // $mail->Password = "wjeitzfkfsufrdmc";
            //Email subject
            $mail->Subject = $subject;
            //Set sender email
            $mail->setFrom('imeenat360@gmail.com', "OTP Token");
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
            echo "OTP could not be sent. Mailer Error: ".$mail->ErrorInfo;
            }
            //Closing smtp connection
            $mail->smtpClose();  
            
            echo "<p style='background-color: azure; color:darkgreen; font-size: 18px; padding:5px;'>Please Enter the OTP Sent to your Email Address: ".$email."</p>";
            
            }
        }
    }


    //verify OTP
    if(isset($_POST['btn_otp'])){
    $conn = mysqli_connect("localhost", "root", "","bill") or exit("failed");

    if(isset($_SESSION['user'])){ 
        $user = $_SESSION['user'];
    
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
        $otp_entered = $_POST['otp'];
       $amount = $_POST['amount'];
        if($_SESSION['otp']==$otp_entered){
            
            $row['balance'];
            $new_balance = $_SESSION['old_bal'] + $_SESSION['amount'];

            //update user wallet balance
            $sql = "UPDATE users SET balance='$new_balance' WHERE username='$user'";
            $result = $conn->query($sql);
            if($result){

                header("Location: receipt.php?amount=$amount");
            }
        }else{
            echo "<script>
                alert('Invalid OTP Code Entered!');
                window.location = 'otp_page.php';
            </script>";
        }
    }}
        ?>
        <h2>Enter OTP</h2>
        <form action="otp_page.php" method="post">
            <label for="otp">OTP Code:</label><br>
            <input type="hidden" name="amount" value="<?=$amount; ?>">
            <input type="text" placeholder="Enter OTP" name="otp" required><br>
            <button type="submit" name="btn_otp">Submit</button>
        </form>
    </div>
</body>
</html>