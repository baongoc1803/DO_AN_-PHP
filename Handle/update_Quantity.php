<?php 
require '../Class/Cart.php';
session_start();
require '../Connect/Connect.php';
$maSP=$_POST['MASP'];
$quan=$_POST['Quantity'];
$userId=$_SESSION['Id'];
$pro=Cart::getById($userId,$maSP);
if(!empty($maSP)&&!empty($quan)){
    echo $quan;
    Cart::update($quan,$pro->IdCart);
    header("location: ../main/cart.php");
    exit();
}
header("location: ../main/index.php?error=update quantity error");