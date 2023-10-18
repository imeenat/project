<?php
// session_start();
   //Server connection
   include "../includes/connection.php";
   include "../includes/core.php";
$user = $_SESSION['username'];

$sql = "SELECT * FROM customers WHERE username='$user'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

$ref = $_GET['reference'];

if($ref==""){
    header("Location: javascript://history.go(-1)");
}

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_3409fcb2c1b1bda39ef90dcd974f6650483a1550",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
  
    if($result->data->status=="success"){
        $status = $result->data->status;
        $reference = $result->data->reference;
        $lastname = $result->data->customer->last_name;
        $firstname = $result->data->customer->first_name;
        // $fullname = $firstname." ".$lastname;
        $customer_email = $result->data->customer->email;
        date_default_timezone_set("Africa/Lagos");
        $date_time = date('m/d/Y h:i:s a', time());
        $dep_amount = $result->data->amount;
        // $fullname =  $result->data->metadata->custom_fields[0]->full_name;
        $fullname =  $row['full_name'];
        $charge = 0;
        // $amount = $dep_amount-$charge;
       
        $amount = $dep_amount/100;
        $type = "Deposit";
       

     
        // TODO: implement wallet update before insert
            #code here....
            $wallet = $row['wallet'];
            $new_bal = $wallet + $amount;
            $token = "";
            $query = "UPDATE customers SET wallet = $wallet + $amount WHERE email= '$customer_email'";
            $result = mysqli_query($conn, $query);
        // 
      
        $stmt = $conn->query("INSERT INTO `deposit`(`name`, `amount`, `charge`, `status`, `trans`, `type`) VALUES ('$fullname', '$amount', '$charge', '$status', '$reference', '$type')");
        // $stmt->bind_param("sssssss", $fullname, $amount, $charge, $status, $reference, $date_time, $type);
        // $stmt->execute(); 

        //Insert into transaction table
        $stmts = $conn->query("INSERT INTO `transactions`(`fname`, `username`, `email`, `amount`, `balance_bf`, `balance_af`, `purchase_code`, `trx_type`, `trx_id`, `status`) VALUES ( '$fullname', '$user', '$customer_email', '$amount', '$wallet', '$new_bal', '$token', '$type', '$reference', '$status')");
        // $stmts->bind_param("sssssssssss", $fullname, $user, $customer_email, $amount, $wallet, $new_bal, $token, $type, $reference, $date_time, $status);
        // $stmts->execute();

        if($stmt){
            header("Location: success.php?amount=".$amount."&ref=".$reference);
        }
    }else{
        header("Location: error.html");
    }

  }
?>