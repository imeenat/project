<?php
include "../server.php";

if(isset($_GET['resolve'])){
    $id = $_GET['resolve'];

    $sql = "UPDATE complains SET status='Resolved' WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res){
        header("Location: view_complains.php");
    }

}


?>