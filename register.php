<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shop_db";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // password hash

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if($conn->query($sql) === TRUE){
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>