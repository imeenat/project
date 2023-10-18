<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Admin</title>
    <style>
        /* body{
            background-color: #1cc88a;
            color: #fff;
            overflow: hidden;
        }

        .container{
            height: 100vh;
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: whitesmoke;
            margin: 0 350px;
        }

        input{
            padding: 12px;
            width: 95%;
        }
        button{
            padding: 14px;
            width: 110%;
            background-color: #1cc88a;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight:bold;
        }

        h2{
            color: #1cc88a;
            font-size: 32px;
            font-family: sans-serif;
        }
        h3{
            position: absolute;
            color: azure;
            font-size: 26px;
            font-family: sans-serif;
        } */
 body {
    background-color: #1cc88a;
    color: #fff;
    overflow: hidden;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.container {
    height: 60vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: whitesmoke;
    margin: 0 auto;
    /* margin-top: 150px; */
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
<h3><a href="./" id="admin"><i class="las la-home"></i>Admin Dashboard</a></h3>

    <div class="container">
        <h2>Add New Admin</h2>
        <form action="process.php" method="post">
            <input type="text" placeholder="Full Name" name="fname"><br><br>
            <input type="text" placeholder="Username" name="user"><br><br>
            <input type="tel" placeholder="Phone No" name="phone"><br><br>
            <input type="email" placeholder="Email" name="email"><br><br>
            <input type="password" placeholder="Password" name="pass"><br><br>
            <button type="submit" name="btn_add_admin">Register</button>
        </form>
    </div>
</body>
</html>