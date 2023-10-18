<?php
// session_start(); 
include "../includes/connection.php";
require_once "../includes/core.php";


    $name = $user['full_name'];
    $email = $user['email'];
    $balance = $user['wallet'];
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Wallet</title>
    <style>
    /* Colors */
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container{
        width: 100%;
        /* max-width: 240px; */
        height: 50vh;
        display: flex;
        flex-direction: column;
        align-items:center;
        justify-content:center;
    }
    
    h1 {
        color: #333;
        text-align: center;
    }
    
    .form-group label {
        color: #555;
        font-weight: bold;
    }
    
    .form-group input {
        padding: 10px;
        /* border: 1px solid #ccc; */
        border-radius: 4px;
        width: 100%;
    }
    
    .form-submit button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .form-submit button:hover {
        background-color: #45a049;
    }

    button{
        width:109%;
        margin-top: 10px;
    }
</style>
</head>
<body>
    <a href="../customer"><h2>Back</h2></a>
    <div class="container">
  <h2>Fund Wallet</h2>
    <form id="paymentForm" action="">
    <div class="form-group">
        <!-- <label for="email">Email Address</label> -->
        <input type="hidden" id="email-address" required value="<?php echo $email; ?>" name="email"/>
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" id="amount" required name="amount" placeholder="Enter Amount"/>
    </div>
    <div class="form-group">
        <!-- <label for="first-name">First Name</label> -->
        <input type="hidden" id="first-name" value="<?php echo $name; ?>"/>
    </div>
    <div class="form-group">
        <!-- <label for="last-name">Last Name</label> -->
        <input type="hidden" id="last-name" value="" />
    </div>
    <div class="form-submit">
        <button type="submit" onclick="payWithPaystack()"> Pay </button>
    </div>
    </form>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    </div>

    <script>
       const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_4ca55f702a3e739ed5f73b3a29407fa9f514aec7', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value*100,
            ref: 'AUK-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
                window.location="http://localhost/electricity/fund_wallet";
            alert('Transaction Cancelled.');
            },
            callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
            window.location="paystack_verify.php?reference="+response.reference;
            }
        });

        handler.openIframe();
        }

    </script>
</body>
</html>
