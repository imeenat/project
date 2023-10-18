<?php
include "../server.php";

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM complains WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res){
        header("Location: view_complains.php");
    }

}


?>