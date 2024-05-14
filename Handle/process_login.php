<?php
require '/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Connect/connect.php';

$username=$_POST['Username'];
$password=$_POST['Password'];
$sql="SELECT Id,Name,FROM `user` WHERE UserName='$username' and Password='$password'";
$account=mysqli_query($conn,$sql);
$num_rows=mysqli_num_rows($account);
if($num_rows==1){
    session_start();
    $each=mysqli_fetch_array($account);
    $_SESSION['Id']=$each['Id'];
    $_SESSION['Name']=$each['Name'];

    if($each['Admin']==1){
        $_SESSION['Admin']=1;
        header("location: ./admin/home");
        exit;
    }
    else{
        $_SESSION['Admin']=0;
        header("location: ./index.php?success=login successfully");
        exit;
    }
}
header("location: login.php?error=username or password is incorrect");