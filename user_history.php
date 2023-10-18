<!DOCTYPE html>
<html>
<head>
    <title>Transactions Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<a href="user_dashboard.php">Back to Dashboard</a>
<div class="container mt-4">
    <h2>Transaction Table</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Balance Before</th>
                <th>Balance After</th>
                <th>Purchase Code</th>
                <th>Transaction Type</th>
                <th>Transaction Id</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
<?php
$conn=mysqli_connect("localhost","root","","bill");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();

$user = $_SESSION['user'];
$sql="SELECT userId, fname, username, email, amount, balance_bf, balance_af, purchase_code, trx_type, trx_id, trx_time, status FROM transactions WHERE username='$user'";

if ($result=mysqli_query($conn,$sql))
{
// Fetch one and one row
while ($row=mysqli_fetch_row($result))
{
    echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[5]."</td>";
    echo "<td>".$row[6]."</td>";
    echo "<td>".$row[7]."</td>";
    echo "<td>".$row[8]."</td>";
    echo "<td>".$row[9]."</td>";
    echo "<td>".$row[10]."</td>";
    echo "<td>".$row[11]."</td>";
    echo "</tr>";
}
// Free result set
mysqli_free_result($result);
}

mysqli_close($conn);
?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>