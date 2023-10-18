<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        *{
            margin:0;
            padding:0
            box-sizing:border-box;
        }

        body{
            width:80%;
            height:100vh;
        }
        footer{
            background-color: black;
            color:white;
            width:100vw;
            padding: 5rem;
           position: absolute;
           bottom:-100px;
           margin-left: -40px;
        }
       footer h3{
            color: white;
            margin-top: -70px;
        }

        footer a:link, footer a:visited{
            color:white;
        }
    </style>
</head>
<body>
    <footer>
            <h3>  <a href="admin_login.php">&copy;</a><?php echo date("Y"); ?>&nbsp;&nbsp;&nbsp;Department of Computer Science Hassan Usman Katsina Polytechnic.</h3>

        </footer>
</body>
</html>