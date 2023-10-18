<?php
session_start();
include_once("../server.php");//Establishing database connection

//PHP MAILER ...
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

   
$errors = array();

if(isset($_POST['btn_register'])){
    //variable declarations
    $fname = $_POST['fname'];
    $username = $_POST['user'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['pwd']);
    $cpassword = md5($_POST['cpwd']);

    //VALIDATION SECTION
    if(empty($fname)){array_push($errors, "Full Name is Required");}
    if(empty($username)){array_push($errors, "Username is Required");}
    if(empty($phone)){array_push($errors, "Phone Number is Required");}
    if(empty($email)){array_push($errors, "Email Address is Required");}
    if(empty($password)){array_push($errors, "Password is Required");}
    if(empty($cpassword)){array_push($errors, "Confirm Password is Required");}

    if($password!=$cpassword){array_push($errors, "Passwords Mismatched");}
    
    $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $qresult = mysqli_query($conn, $query);
    if(mysqli_num_rows($qresult)>0){
        array_push($errors, "User Already Exist.");
    }

 


    if(count($errors)==0){
         //SQL statement
  

    $sql = "INSERT INTO users (id, fullName, username, phone, email, pass) VALUES (null, '$fname', '$username', '$phone', '$email', '$password')";
    $res = mysqli_query($conn, $sql);
    
    
        $subject = "Registration Successful.";
        $subject2 = "Registration Successful, A notification message sent to your email.<br>You can now Login.";
        $message = "Congrats ".$fname.", <br> You are successfully registered on KEDCO Meter Token Purchase and Management System, you can now login and buy Meter Token or forward your complain. <br><br><br><b>Management</b>";
     
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
	$mail->Username = "@gmail.com";
//Set gmail password
	$mail->Password = "";
//Email subject
	$mail->Subject = $subject;
//Set sender email
	$mail->setFrom('@gmail.com',"KEDCO Katsina");
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
        $_SESSION['sent'] = $subject2;
	}else{
		echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
	}
//Closing smtp connection
	$mail->smtpClose();  


    // 
        
    $_SESSION['sent'] = $subject2; 
       
       

    header("Location:login.php");
    }


   

   
}



    // 

   //USER LOGIN SECTION
if(isset($_POST['btn_login'])){
    $username = $_POST['user'];
    $password = md5($_POST['pwd']);


    //VALIDATION SECTION
    if(empty($username)){array_push($errors, "Username is Required");}
    if(empty($password)){array_push($errors, "Password is Required");}

    

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['user'] = $_POST['user'];
        header("Location: user_dashboard.php");
    }else{
       array_push($errors, "Invalid username/password or user not registered");
       
    }
}

//ADMIN LOGIN SECTION
if(isset($_POST['admin_login'])){
    $username = $_POST['admin'];
    $password = $_POST['pass'];


    //ADMIN VALIDATION SECTION
    if(empty($username)){array_push($errors, "Admin Username is Required");}
    if(empty($password)){array_push($errors, "Admin Password is Required");}

    
    if(count($errors)===0){

   
    $sql = "SELECT * FROM `admin` WHERE username='$username' AND password='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $_SESSION['admin'] = $username;
        // header("Location: index.php");
        echo  "<script>
        swal.fire('Success', 'Logged in Successful', 'success').then(function(result){if(true){window.location='index.php'}});
    </script>";
    }else{
    //    array_push($errors, "Invalid username/password or Admin not registered");
   echo  "<script>
        swal.fire('Wrong', 'Invalid Username or Password', 'error');
    </script>";
       
    }
}
}


//DELETE SECTION
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM complains WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
}

//ADD ADMIN
if(isset($_POST['btn_add_admin'])){
    //variable declarations
    $fname = $_POST['fname'];
    $username = $_POST['user'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "INSERT INTO admin (full_name, username, phone_no, email, password) VALUES ('$fname', '$username', '$phone', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "
            <script>
                alert('Admin Added Successfully...');
                window.location = 'index.php';
            </script>
        ";
    }

}




//RESOLVED SECTION WITH EMAIL SENDING
if(isset($_GET['resolve'])){
    $id = $_GET['resolve'];

    $query = "SELECT * FROM `complains` WHERE id=$id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($res);



    $email = $data['email'];
    $complain = $data['complain'];

    $sql = "UPDATE `complains` SET status='Resolved' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: view_complains.php?msg='Complain Resolved Successfully....'");


$subject = "Complain Resolved";
// $subject2 = "Registration Successful, A notification message sent to your email.<br>You can now Login.";
$message = "Hello Dear, <br> your complain <q>".$complain."</q> has been resolved. <br><br><br>Thanks,<b>Management</b>";

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
$mail->setFrom('imeenat360@gmail.com', "KEDCO  Management");
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
$_SESSION['sent'] = $subject2;
}else{
echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}
//Closing smtp connection
$mail->smtpClose();  


// 

$_SESSION['sent'] = $subject2; 

    }
}



// header("Location:login.php");

//PASSWORD RESET SECTION
if(isset($_POST['reset'])){
    $nin = $_POST['nin'];
    $username = $_POST['user'];
  
    $sql = "SELECT * FROM users WHERE nin=$nin AND username='$username'";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result)>0){
      header("Location: update_password.php?edit=$username");
    }
  }
  
  //Update password Section
  if(isset($_POST['update'])){
    $username = $_GET['edit'];
    $newPass = md5($_POST['pass']);
    $cnewPass = md5($_POST['cpass']);
  
  // if($newPass!=$cnewPass){
  //   echo "<script>
  //     alert('Password and Confirm Password Mismatch');
  //     window.location='forget_password.php';
  //   </script>";
  // }
  
    $sql = "UPDATE users SET password='$newPass' WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
  
    if($res){
      header("Location: login.php?pass=Password Reset");
  
    }
  }
  

?>