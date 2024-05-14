<?php 
require '../Class/Cart.php';
session_start();
require '../Connect/Connect.php';
$id=$_SESSION['Id'];
if(!empty($id)){
    
    if(!empty($_POST['MaSP'])){
        $maSP=$_POST['MaSP'];
        $product=Cart::getById($id,$maSP);
        if($product->IdCart<=0){
            Cart::insert($maSP,$id,1);
            $product=Cart::getById($id,$maSP);
            
        }else{
           Cart::update($product->Quantity+1,$product->IdCart);
        }
        header("location: ../main/cart.php");
        exit();
    }
}
header("location: ../main/login.php"); 