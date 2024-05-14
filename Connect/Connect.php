<?php
$conn = mysqli_connect("localhost","root","mysql","qlcuahang");
$check = mysqli_error($conn);
if($check)
    die($check);

$dsn = "mysql:host=localhost;dbname=qlcuahang";
$username = "root";
$password = "mysql";

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>