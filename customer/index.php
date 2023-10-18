<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>
	
		alert('You Must Login to Access this Page!');
		window.location = '../index.php';
	</script>";
	exit(0);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Customer Dashboard</title>
</head>
<body>
<?php
// session_start();
include "../includes/connection.php";

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM customers WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);
}else{
	$_SESSION['username'] = "";
}


?>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Welcome, <?php echo $row['full_name']; ?></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../fund_wallet/">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Fund Wallet</span>
				</a>
			</li>
			<li>
				<a href="./Request_For_Token/">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Request For Token</span>
				</a>
			</li>
			<li>
				<a href="../complain_form.php/">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Forward Complain</span>
				</a>
			</li>
			<li>
				<a href="../transactions/">
					<i class='bx bxs-file' ></i>
					<span class="text">Transactions</span>
				</a>
			</li>
			<li>
				<a href="./view_complains.php">
					<i class='bx bxs-edit' ></i>
					<span class="text">View Complaints</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../includes/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
					<button type="submit" class="search-btnx"><i class='bx bx-searchx' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<!-- <i class='bx bxs-bell' ></i> -->
				<!-- <span class="num">8</span> -->
			</a>
			<a href="#" class="profile">
				<!-- <img src="img/people.png"> -->
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Customer Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Customer</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="../includes/logout.php" class="btn-download">
					<i class='bx bxs-lock' ></i>
					<span class="text">Logout</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo date("d-m-Y") ?></h3>
						<p>TODAY'S DATE</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-bank' ></i>
					<span class="text">
						<h3><a href="../fund_wallet/">FUND WALLET</a></h3>
						<p></p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>&#8358;<?= number_format($row['wallet']); ?></h3>
						<p>WALLET BALANCE</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Transactions</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Transaction Id</th>
								<th>Type</th>
								<th>Amount</th>
								<th>Date </th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$sql = $conn->query("SELECT * FROM transactions WHERE username='$username'");
								while($row = mysqli_fetch_assoc($sql)): ?>
							<tr>
								<td>
									<!-- <img src="img/people.png"> -->
									<p><?= $row['trx_id']; ?></p>
								</td>
								<td><?= $row['trx_type']; ?></td>
								<td><?= $row['amount']; ?></td>
								<td><?= $row['trx_time']; ?></td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<?php endwhile; ?>
							
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>