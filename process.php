<?php

include "includes/connection.php";


//REGISTRATION SECTION 
if(isset($_POST['btn_reg'])){
    //variables
$full_name = $_POST['fname'];
$username = $_POST['user'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];

$query = "SELECT * FROM customers WHERE username='$username' OR email='$email' OR phone='$phone'";
$res = mysqli_query($conn, $query);

if(mysqli_num_rows($res)>0){
    header("Location: register.php?exist=yes");
    exit();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: register.php?invalidmail=yes");
    exit();  
}

$sql = "INSERT INTO customers (`full_name`, `username`, `email`, `password`, `phone`) VALUES ('$full_name', '$username', '$email', '$pass', '$phone')";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: index.php");
}
}

//CUSTOMER LOGIN
if(isset($_POST['btn_login'])){
    //variables declaration
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        session_start();
        $_SESSION['username'] = $username;
        // header("Location: customer/");
        echo "<script>
        swal.fire('Success', 'Logged In', 'success').then(function(result){if(true){window.location = 'customer/'}})
        ;
        </script>";
    }else{
        // echo "<script>
        //     alert('Invalid username/password!');
        //     window.location = 'index.php';
        // </script>";
        echo "<script>
        swal.fire('Wrong', 'Invalid Username or Password', 'error').then(function(result){if(true){window.location = 'index.php'}})
        ;
        </script>";
    }

}

?>