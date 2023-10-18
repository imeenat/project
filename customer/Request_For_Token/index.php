<?php

if(isset($_POST['verify'])){



// $meter_no = "30530288148";
// $meter_type = "prepaid";
$meter_no = $_POST['meter_no'];
$meter_type = $_POST['meter_type'];
$base_url = "https://n3tdata.com/api/bill/bill-validation?meter_number=".$meter_no."&disco=3&meter_type=$meter_type";

    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $base_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // grab URL and pass it to the browser
    $response = curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    // decode the response
    $response_data = json_decode($response, true);

    $result = $response_data['name'];

    // print the name
   echo "<script> alert('Customer Name: $result');</script>";
//    echo "<script> alert('Customer Name: '".$result."');</script>";

}


if(isset($_POST['btn_buy'])){
    $meter_no = $_POST['meter_no'];
    $meter_type = $_POST['meter_type'];
    $amount = $_POST['amount'];

// Checking user balance before transaction
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'] ; 
    $sql = "SELECT * FROM users WHERE username='$user'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);
$wallet = floatval($row['balance']);
$userId = $row['id'];
$fname = $row['fname'];
$email = $row['email'];
$balance_after = $wallet-$amount;
//verify user amount before transaction
if($amount>$wallet){
    echo "<script>
        alert('Sorry, Insufficient Balance, Pls Fund Your Wallet');

        window.location = 'index.php';
    </script>";
   
}
}



    $url = 'https://n3tdata.com/api/bill';
    
    $bypass = false;
    $request_id = uniqid("ES-");
    // $phone = $_POST['phone'];

    $paypload = array(
        'disco' => 3,
         'meter_type' => $meter_type,
         'meter_number' => $meter_no,
         'amount' => $amount,
         'bypass' => false,
         'request-id' => $request_id);

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paypload));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $headers = [
              "Authorization: Token apikeyhere",
             'Content-Type: application/json'
         ];
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         $response = curl_exec($ch);
         curl_close($ch);
         
         
         // decode the response
         echo $response_data = json_decode($response, true);
         if($response_data['status']=='success'){
            $_SESSION['token'] = $response_data;

            $purchase_code = $response_data['token'];
            $sql = "INSERT INTO transactions (userId, fname, username, email, amount, balance_bf, balance_af, purchase_code, trx_type, trx_id, trx_time, status) VALUES()";
            $res = mysqli_query($conn, $sql);

            $query = "UPDATE users SET balance=$balance_after WHERE username='$user'";
            mysqli_query($conn, $query);
            header("Location: token.php");
         }else{
            $status = $response_data['message'];
            echo "<script>
                alert('There is an Error! $status');
                window.location = 'index.php';
                
            </script>";
         }
        //  $message = $response_data['message'];

        //  echo substr($message, 0, 44);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedco Bill Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<style>
    body{
        background-image: linear-gradient(45deg, #354649, #A3C6C4);
        width: 100vw;
        height: 100vh;
        display:flex;
        flex-direction: column;
        align-items:center;
        
    }
    .container{
        width: 30%;
        background-color: #eee;
        padding:20px;
    }

    a{
        text-decoration: none;
        font-size: 20px;
        color: rgb(6, 80, 6);
        font-weight: bolder;
    }

    #h2{
        margin-top:-50px;
        width:30%;
        text-align:center;
    }
    footer{
        position: absolute;
        bottom: 0px;
        color: #E0E7E9;
    }
</style>
</head>
<body>
    <a href="../">Back to User Dashboard</a>
    <br><br><br>
    <h2 class="text-center text-white bg-dark p-3" id="h2">Buy Meter Token</h2>

    <div class="container">
        <form action="index.php" method="post">
        <div class="form-group">
            <label for="meter_type">Meter Type</label><br>
            <!-- <input type="text" class="form-control" placeholder="Enter Meter Number"> -->
            <select name="meter_type" id="" class="form-control">
                <option value="">Select Option </option>
                <option value="prepaid">Prepaid</option>
                <option value="postpaid">Pospaid</option>
            </select><br>
        </div>
        <div class="form-group">
            <label for="meter_no">Meter Number</label><br>
            <input type="text" class="form-control" placeholder="Enter Meter Number" name="meter_no">
            <button class="form-control btn btn-primary btn-sm" name="verify">Verify Meter Account User</button><br><br>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label><br>
            <input type="number" class="form-control" placeholder="Enter Amount" name="amount"><br>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" placeholder="Enter Email" name="email"><br>
        </div>

        <button class="form-control btn btn-success" name="btn_buy">Purchase</button>
    </div>
    </form>

    <footer>
        <p>Copyright &copy;Department of Computing and Information Technology Alqalam University Katsina.</p>
    </footer>
</body>
</html>