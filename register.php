
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="static/index.css">
	<script src="./includes/sweetalert2/dist/sweetalert2.all.js"></script>
	<!-- <script src="./includes/sweetalert/dist/sweetalert.min.js"></script> -->

    <style>
		*{
			margin: 0;
			padding: 0;
			box-sizing:border-box;
			text-decoration: none;
		}
		
        body{
			background-image: linear-gradient(to bottom right, #354649, #A3C6C4);
			color: #E0E7E9;
            /* overflow: hidden; */
		}
        header {
			height: 11vh;
			background-color: #354649;
			color: #E0E7E9;
			text-align: center;
		}
        
		h2{
			margin-top:10px;
			margin-bottom:10px;
		}
        .container{
            display: flex;
			flex-direction:column;
			align-items: center;
			justify-content: center;
			margin-top:15px;

        }
       
        p{
            color: azure;
        }

        p a{
            color: gray;
        }
        /* img#png{
			position: absolute;
			right: 30px;
			width: 550px;
			height: 550px;
			border-radius: 150px;
			top: 20px;
		} */
        form {
			display: inline-block;
			border: 2px solid #E0E7E9;;
			padding: 20px;
			background-color:#354649;
			border-radius: 8px;
			
		}

		label {
			display: block;
			margin-bottom: 10px;
			color: #E0E7E9;
		}

		input[type="text"],
		input[type="number"],
		input[type="password"] {
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 10px;
			background-color: #E0E7E9;
			color: #000;
		}

		button{
			padding: 10px;
			border: none;
			cursor: pointer;
			border-radius: 8px;
			background-color: #A3C6C4;
			color:  #354649;
			font-size:12px
		}

		button:hover {
			background-color: #E0E7E9;
			border-radius: 8px;
			color: #354649;
		}
        footer {
			background-color: #354649;
			color: #E0E7E9;
			margin-top: 30px;
			height: 8.5vh;
			text-align: center;
		}
       
    </style>
</head>
<?php
if(isset($_GET['exist'])){
    // echo "<script>
    //     alert('Sorry User Already Exist!');
    // </script>";
	// echo "<script>
	// swal.fire('Warning', 'Sorry User Already Exist!', 'warning').then(function(result){if(true){window.location = 'register.php'}})
	// ;
	// </script>";

	echo "<script>
	Swal.fire('Warning', 'Sorry User Already Exist!', 'warning').then(function(result){if(true){window.location = 'register.php'}})
	;
	</script>";
}
if(isset($_GET['invalidmail'])){
    echo "<script>
        alert('Invalid Email Address Entered!');
    </script>";
	// echo "<script>
	// swal.fire('Warning', 'Invalid Email Address Entered!', 'warning').then(function(result){if(true){window.location = 'register.php'}})
	// ;
	// </script>";

	echo "<script>
	Swal.fire('Warning', 'Sorry Email Address is Invalid!', 'warning');
	</script>";
}

?>
<body>
<!-- <script src="sweetalert2/dist/sweetalert2.all.js"></script> -->

    <header>
		<marquee behavior="" direction=""><h1>An Online Electricity Meter Recharge and Requests for Maintainance Management System</h1></marquee>
	</header>
    <div class="container">
        <h2>Customer Registration Page</h2>
        <form action="process.php" method="post">
            <label for="">Full Name:</label>
            <input type="text" placeholder="Enter Your Full Name" name="fname" required><br>
            <label for="">Username:</label>
            <input type="text" placeholder="Enter Your Username" name="user" required><br>
            <label for="">Email:</label>
            <input type="text" placeholder="Enter Your Email" name="email" required><br>
            <label for="">Phone Number:</label>
            <input type="text" placeholder="Enter Your Phone Number" name="phone" minlength="11" maxlength="15" required><br>
            <label for="">Password:</label>
            <input type="password" placeholder="Enter Your Password" name="pass" minlength="4" maxlength="12" required><br>
            <button name="btn_reg">Register</button>
            <p>Already Have an Account? Login <a href="index.php">Here</a></p>
        </form>
    </div>
    <!-- <img src="images/app.png" alt="" id="png"> -->
    <footer>
		<p>&copy; <?php  echo date("Y"); ?>  Department of Computing and Information Technology Alqalam University Katsina.</p>
	</footer>

	<!-- <script>
	Swal.fire('Warning', 'Sorry User Already Exist!', 'warning').then(function(result){if(true){window.location = 'register.php'}})
	;
	</script> -->
</body>
</html>