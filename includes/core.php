<?php
session_start();
// Include your server.php file with the database connection
require_once '../includes/connection.php';
$username = $_SESSION['username'];
// Function to get the current user
function getCurrentUser($username, $conn)
{
    $query = "SELECT * FROM customers WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
 

    // Fetch the user data
    $user = mysqli_fetch_assoc($result);
  

    return $user;
}

// Usage example
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user = getCurrentUser($username, $conn);

    if ($user) {
        // User found, you can access the user data
       // echo 'Welcome, ' . $user['username'] . '! Your email is: ' . $user['email'];
    } else {
        // User not found
        echo "<script>
        alert('Please Login First');
        window.location = '../';
    </script>";
    }
} else {
    // Session variable not set, user not authenticated
    echo "<script>
        alert('Please Login First');
        window.location = '../';
    </script>";
}
?>
