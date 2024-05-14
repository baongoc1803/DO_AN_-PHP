<?php
    include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/header.php";
    require "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Connect/connect.php";
    require "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Class/User.php";
    //Header
    //Login
    $userNameLogin=""; $passwordLogin=""; $errUserNameLogin=""; $errPasswordLogin=""; 
    // Register
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['Process']=="login"){
            $userNameLogin=$_POST['Username'];
            $passwordLogin=$_POST['Password'];
            if(empty($userNameLogin)){
                $errUserNameLogin="Vui lòng nhập username";
            }
            if(empty($passwordLogin)){
                $errPasswordLogin="Vui lòng nhập password";
            }
            if(!empty($userNameLogin)&&!empty($passwordLogin)){
                $sql="SELECT * FROM `user` WHERE UserName='$userNameLogin'";
                $result = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($result); 
                $account= Users::getUsers($sql);
                $num_rows=count($account);
                if($num_rows == 1){
                    $row = mysqli_fetch_array($result);
                    $_SESSION['Id'] = $row['Id'];
                    $_SESSION['Name'] = $row['Name'];
                }
            }
            if(isset($_SESSION['Id'])){
                header("location: index.php");
                exit;
            }
        }
        $errPasswordLogin="Tài khoản hoặc mật khẩu sai!!!";
    }
    ?>
<style>
 
</style>
<div class="container">
<div class="bk row mx-auto">
        <div class="login">
        <form method="post" enctype="multipart/form-data">
            <div class="row col-md-6 mx-auto">
                <div class="col-md-8">
                    <h2 class="col-md-6 mx-auto" style="color:cadetblue">Login</h2>
                    <input type="hidden" name="Process" value="login">
                    <label class="form-label">User Name</label>
                    <input class="form-control" name="Username" value="<?php echo $userNameLogin ?>"/> <?php echo "<p class='text-danger'>$errUserNameLogin</p>" ?>
                </div>
                <div class="col-md-8">
                <label class="form-label">Password</label>
                    <input class="form-control" type="password"  name="Password" value="<?php echo $passwordLogin ?>"/> <?php echo "<p class='text-danger'>$errPasswordLogin</p>" ?>
                </div>
            </div>
            <div class="row w-50 mx-auto">
                <div class="col-md-12">
                    Nếu Chưa có tài khoản:
                    <a href="register.php" style="text-decoration:none;color:red">ĐĂNG KÝ TÀI KHOẢN</a>
                </div>
                <br/>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
            </form>
           
        </div>
    
</div>
</div>
<?php include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/footer.php"; ?>