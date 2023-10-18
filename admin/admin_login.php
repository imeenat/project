<?php 
// session_start();

include_once("../server.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- <link rel="stylesheet" href="./static/index.css"> -->
    <!-- <script src="./includes/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="./includes/sweetalert2/dist/sweetalert2.all.js"></script>
    <style>
    body {
    background-color: #1cc88a;
    color: #fff;
    overflow: hidden;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.container {
    height: 50vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: whitesmoke;
    margin: 0 auto;
    margin-top: 150px;
    max-width: 400px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

form {
    width: 100%;
    margin-top: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

input {
    padding: 10px;
    width: 80%;
    border: none;
    border-radius: 4px;
}

button {
    padding: 10px;
    width: 80%;
    background-color: #1cc88a;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
}

h2 {
    color: #1cc88a;
    font-size: 32px;
    text-align: center;
}

/* Media queries for responsiveness */
@media screen and (max-width: 768px) {
    .container {
        max-width: 90%;
    }
    input, button {
        width: 80%;
    }
}

 
    </style>
</head>
<body>
<?php include_once("process.php"); ?>




    <div class="container">
        <?php  
        if(isset($_SESSION['sent'])){
            echo $_SESSION['sent'];
        }
        
        ?>
        <h2>Admin Login</h2>
        <form action="admin_login.php" method="post">
        <?php include_once("errors.php"); ?>

            
            <div class="form-group">
                <input type="text" placeholder="Username" name="admin">
            </div>
            
            <div class="form-group">
                <input type="password" placeholder="Choose Password" name="pass">
            </div>
           
            <button name="admin_login">Login</button>
        </form>
    </div>
</body>
</html>