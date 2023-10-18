<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        body{
            background-color:gray;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }
        .container{
            width: 350px;
            height:100vh;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content: center;
            background-color:whitesmoke;
            margin: 80px 0;
            padding: -30px;
            border-radius:2rem;
        }

        button{
            padding: 18px;
            border:none;
            border-radius: 7px;
            background-color: green;
            color: white;
            font-weight: bold;

        }

        input{
            padding: 12px;
            border:none;
            border-radius: 6px;
            background-color: azure;
            /* color: white; */
        }

        h2{
            color:darkgreen;
        }



    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form action="process.php" method="post">
            <input type="text" placeholder="Enter your email" name="email"><br><br>
            <input type="text" placeholder="Enter Username" name="user"><br><br>
            <button type="submit" name="reset">Reset Password</button>

        </form>
    </div>
</body>
</html>