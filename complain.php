<?php  include("server.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complains</title>
    <link rel="stylesheet" href="./lineAwesome/css/line-awesome.min.css">

    <style>
        body{
            font-family: sans-serif;
        }
        table{
            width: 80%;
            margin: auto;
        }
        table,th,td{
               border: 1px solid black;
               border-collapse: collapse;
               padding: 10px;
        }

        tr:nth-of-type(even){
            background-color: rgb(200,200,200);
        }

        h2{
            text-align:center;
            font-size: 35px;
        }
        button{
            padding: 6px;
        }

        .status{
            background-color: dodgerblue;
        }

        #del{
            background-color: red;
        }

        #logout{
            position: relative;
            float: right;
            font-size: 22px;
            text-decoration: none;
            color:red;
            font-weight: bold;
        }

        .las{
            font-weight:bolder;
        }

        #admin{
            float:left;
            font-size:25px;
        }

        #Resolved{
            background-color: green;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php //include("process.php");   ?>
    <div class="container">
    <h3><a href="./customer" id="customer"><i class="las la-home"></i>Admin Dashboard</a></h3>
    <a href="index.php" id="logout"><i class="las la-power-off"></i>Logout</a>
    <br><br><br>
        <h2>Users Complaints</h2>

        <table>
            <thead>
                <tr>
                    <th>SNo.</th>
                    <th>Email</th>
                    <th>Complain</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sn = 1;
                $sql = "SELECT * FROM complains";
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['complain']; ?></td>
                    <td><a href="view_complains.php?resolve=<?=$row['id']; ?>"><button id="<?php echo $row['status'];?>"   class="status"><?php echo $row['status']; ?></button></td>
                    <td><a href="view_complains.php?delete=<?=$row['id']; ?>"><button id="del">Delete</button></a></td>
                </tr>
                <?php  endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>