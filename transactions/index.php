<?php
session_start();

$username = $_SESSION['username'];
include "../includes/connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- <link rel="stylesheet" href="index.css"> -->
	<style>
		body{
			font-family: sans-serif;
			font-size: 18px;
		}
		table{
			margin: auto;
			width: 80%;
			text-align: center;
		}

		th, td{
			padding: 5px;
		}
		th{
			background-color: #4ee;
		}
		tr:nth-last-of-type(odd){
			background-color: #fff;
		}
		h3{
			text-align: center;
		}
		/* #logout{
            position: relative;
            float: right;
            font-size: 30px;
            text-decoration: none;
            color:rgb(107, 9, 9);
            font-weight: bolder;
            margin-top: -50px;
        } */

        h2 a{
            text-decoration: none;
            font-size: 30px;
            color: rgb(6, 80, 6);
            font-weight: bolder;
            
        }
	</style>
</head>
<body>
	<div class="container">
		<a href="../customer"><h2>Back to Dashboard</h2></a>
<div class="table-data">
				<div class="order">
					<div class="head">
						<br>
						<h3>Transactions</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<!-- <i class='bx bx-filter' ></i> -->
						<br>
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
			</div>
			<script src="script.js"></script>
</body>
</html>