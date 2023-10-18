<?php
session_start();
include "../server.php";






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
        <img src="../images/kedco.png" alt="" width="152" height="92">
        <h1 style="font-size:20px">KEDCO NIG. LTD</h1>
        <p>No. 8 Yahaya Madaki Way, Katsina Branch.</p>
        <h2 style="font-size:18px"><u>Meter Token Transaction</u></h2>
        <p>Thanks for Choosing Us Below is Your Transaction Details.</p>
        <table>
        <?php
            // session_start();
            if(isset($_SESSION['token'])){
                $response = $_SESSION['token'];

                $status = $response['status'];
                $disco = $response['disco_name'];
                $meter_no = $response['meter_number'];
                $token = $response['token'];
                // $status = $response['status'];


           
          

?>
            <tr>
                <th>Status</th>
                <td><?=$status;?></td>
            </tr>
            <tr>
                <th>Disco Name</th>
                <td><?=$disco; ?></td>
            </tr>
            <tr>
                <th>Meter Number</th>
                <td><?=$meter_no; ?></td>
            </tr>
            <tr>
                <th>Token</th>
                <td><?=$token; ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?=date('d/m/Y g:ia'); ?></td>
            </tr>
            
            <!-- <tr>
            </tr> -->
            Transaction Id: <?php echo uniqid();?>


        </table><br>
        <p>Thanks for your Patronage.</p>
<?php  } ?>

        <footer>
            <a href="../user_dashboard.php"><button id="rd">Return to Dashboard</button></a>
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

