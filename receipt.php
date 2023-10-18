<?php
session_start();
include "server.php";






if(isset($_GET['amount'])){
    get_user();
    $amount = $_GET['amount'];
    $fname = get_user()['fullName'];
    $email = get_user()['email'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
   <style>
    .container{
        width: 500px;
        text-align:center;
    }

     table, th, td{
        border: 2px solid black;
        border-collapse: collapse;
        margin:auto;
    }
   </style>
</head>
<body>
    <div class="container">
        <img src="images/kedco.png" alt="" width="152" height="92">
        <h1 style="font-size:20px">KEDCO NIG. LTD</h1>
        <p>No. 8 Yahaya Madaki Way, Katsina Branch.</p>
        <h2 style="font-size:18px"><u>Payment Receipt</u></h2>
        <p>Your Wallet was successfully funded.</p>
        <table>
            <tr>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>&#8358;<?=$amount;?></td>
                <td><?=date('d/m/Y g:ia'); ?></td>
            </tr>
            Transaction Id: <?php echo uniqid();?>


        </table><br>
        <p>Thanks for your Patronage.</p>


        <footer>
            <a href="user_dashboard.php"><button id="rd">Return to Dashboard</button></a>
            <button style="float: right" onclick="printer();" id="prt">Print</button>
        </footer>


    </div>
    <script>
        function printer(){
            var prt = document.getElementById('prt');
            var rd = document.getElementById('rd');
            prt.style.visibility='hidden';
            rd.style.visibility='hidden';
            print();
            prt.style.visibility='visible';
            rd.style.visibility='visible';

        }
    </script>
</body>
</html>

