<!DOCTYPE html>
<html>
<head>
	<title>An Online Electricity Meter Recharging and Requests for Maintainance Management System</title>
	<!-- <link rel="stylesheet" type="text/css" href="static/index.css"> -->
	<script src="./includes/sweetalert2/dist/sweetalert2.all.js"></script>

	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing:border-box;
			text-decoration: none;
		}
		
		img#logo{
			position: absolute;
			top: 2px;
			width: 90px;
			height: 90px;
			border-radius: 12px;
			right: 10px;
		}
		img#gif{
			/* position: absolute;
			right: 30px;
			width: 350px;
			height: 350px;
			border-radius: 150px;
			top: 210px; */
		}
		header {
			background-color: #354649;
			color: #E0E7E9;
			padding: 25px;
			text-align: center;
		}
		/* 354649 / 6C7A89 / A3C6C4 / E0E7E9 ofwhit#FCF6F5*/
		nav{
			justify-content: center;
			text-align: center;
			background-color: #A3C6C4;
			color:  #354649;
			padding: 10px;
		}
		main{
			height:65vh;
			padding: 20px;
			background-image: linear-gradient(to bottom right, #354649, #A3C6C4);
			color: #E0E7E9;
			
		}
		
		h2{
			justify-content: center; 
			text-align: center;
		}
		
		.con{
            display: flex;
			flex-direction:column;
			align-items: center;
			justify-content: center;
			margin-top:15px;

        }

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		nav li {
			display: inline-block;
			
		}

		nav li a {
			display: block;
			color: black;
			text-align: center;
			padding: 10px;
			text-decoration: none;
			font-weight: bolder;
			font-size:15px;
		}

		nav li a:hover {
			background-color: #354649;
			border-radius: 8px;
			color: #E0E7E9;
		}
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
			/* background-color: #E0E7E9; */
			color: #354649;
		}

		button[type="submit"] {
			padding: 10px;
			border: none;
			cursor: pointer;
			border-radius: 8px;
			background-color: #A3C6C4;
			color:  #354649;
			font-size:12px
		}

		button[type="submit"]:hover {
			background-color: #E0E7E9;
			border-radius: 8px;
			color: #354649;
		}
		footer {
			background-color: #354649;
			color: #E0E7E9;
			padding: 25px;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php include "process.php"; ?>
	<header>
		<marquee behavior="" direction=""><h1>An Online Electricity Meter Recharge and Requests for Maintainance Management System</h1></marquee>
	</header>

	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<!-- <li><a href="#">Services</a></li> -->
			<li><a href="#">Contact Us</a></li>
			<li><a href="faqs.html">FAQs</a></li>
		</ul>
	</nav>
	<img src="images/alqalam.jpg" alt="" id="logo">
	
	<main>
		<h2>Login to Purchase Meter Token or Requests for Maintainance</h2>
		

		<!-- Login form -->
		<div class="con">
			<form action="index.php" method="post">
				<label for="username">Username:</label>
				<input type="text" placeholder="Enter Username" id="username" name="username" required><br><br>
				<label for="password">Password:</label>
				<input type="password" placeholder="Enter Username" id="password" name="password" required><br><br>
				<button type="submit" name="btn_login">Log In</button>
			</form>
			<p>Don't have an account? <a href="register.php">Sign up here</a></p>
		</div>
<!-- <img src="images/otp1.gif" alt="" id="gif"> -->
		

		
	</main>

	<footer>
		<p>&copy; <?php  echo date("Y"); ?>  Department of Computing and Information Technology Alqalam University Katsina.</p>
	</footer>

	<script>
		// alert("Welcome to Electricity Bill Pay");
	</script>
</body>
</html>
