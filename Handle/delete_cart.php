<?php 
require_once '../Class/Cart.php';
session_start();
require '../Connect/Connect.php';
$id=$_POST['IdCart'];
echo $id;
if(!empty($id)){
    Cart::delete($id);
    header("location: ../main/cart.php");
    exit();
}
header("location: ../main/index.php?error=delete cart error");