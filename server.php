<?php

$conn = mysqli_connect("localhost", "root", "","electricity") or exit("failed");

// if(!$conn){
//     echo "Connection failed to connect";
// }

// echo "This is from server.php";
function get_user(){
    // session_start();
    $conn = mysqli_connect("localhost", "root", "","electricity") or exit("failed");

    if(isset($_SESSION['user'])){ 
        $user = $_SESSION['user'];
    
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    return $row;
    }
    // }else{
    //     echo "please login first";
    // }
}

?>