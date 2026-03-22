<?php
// Database connection
$servername = "localhost";   // XAMPP default
$dbusername = "root";
$dbpassword = "";             // XAMPP default empty
$dbname = "shop_db";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login check
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user in database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            echo "Login successful! Welcome " . $row['username'];
            // এখানে session শুরু করতে পারো
        } else {
            echo "Password is incorrect!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>