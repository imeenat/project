<?php  include("../server.php");  ?>
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
            background-color: rgb(240, 218, 218);
        }
        table{
            width: 50%;
            margin: auto;
        }
        table,th,td{
               border: 1px solid rgb(54, 49, 49);
               border-collapse: collapse;
               padding: 10px;
        }

        thead{
            background-color: rgb(59, 148, 111);
        }

        tr:nth-of-type(even){
            background-color: rgb(157, 202, 180);
        }

        h2{
            text-align:center;
            font-size: 30px;
            color: rgb(6, 80, 6);
        }
    
        button{
            padding: 6px;
        }

        .status{
            background-color: rgb(48, 120, 192);
        }

        #del{
            background-color: rgb(136, 69, 69);
        }

        #logout{
            position: relative;
            float: right;
            font-size: 30px;
            text-decoration: none;
            color:rgb(107, 9, 9);
            font-weight: bolder;
            margin-top: -50px;
        }

        h3 a{
            text-decoration: none;
            font-size: 30px;
            color: rgb(6, 80, 6);
            font-weight: bolder;
            
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
    <h3><a href="./" id="customer"><i class="las la-home"></i>Back to Dashboard</a></h3>
    <a href="index.php" id="logout"><i class="las la-sign-out-alt"></i>Logout</a>
    <br><br><br>
        <h2>Users Complaints</h2>

        <table>
            <thead >
                <tr>
                    <th>S/N</th>
                    <th>Email</th>
                    <th>Complain</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sn = 1;
                $sql = "SELECT * FROM complains ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['complain']; ?></td>
                    <td><a href="resolve_complain.php?resolve=<?=$row['id']; ?>"><button id="<?php echo $row['status'];?>"   class="status"><?php echo $row['status']; ?></button></td>
                    <td><a href="delete_complains.php?delete=<?=$row['id']; ?>"><button id="del">Delete</button></a></td>
                </tr>
                <?php  endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>