<?php
    require '../Class/Cart.php';
    require '../Class/Product.php';
    require '../Connect/Connect.php'; 
    include '../include/header.php';
?>
<!-- Header -->

<?php 
    $result=array();
    if(!empty($_SESSION['Id'])){
        $id=$_SESSION['Id'];
    }
    else{
        header("location: ./login.php"); 
        exit();
    }
    if(!empty($id)){
        $sql="SELECT * FROM `cart` WHERE IdUser=$id";
        $result=Cart::getCart($sql);
     
    }
?>
<style>
    .img {
    max-width: 100px;
}

.info-none-product {
    display: flex;
    flex-direction: column;
    align-items: center;
}

    .info-none-product a {
        border: 1px solid #E02207;
        border-radius: 24px;
        background: #E02207;
        color: white;
    }

        .info-none-product a:hover {
            border: 1px solid #E02207;
            background: white;
            color: #E02207;
        }

.action-product {
    margin-top: 24px;
}

    .action-product .action-1 {
        background: #E02207;
        color: white;
        border: 1px solid #E02207;
    }

        .action-product .action-1:hover {
            background: white;
            color: #E02207;
        }

    .action-product .action-2 {
        background: white;
        color: #E02207;
        border: 1px solid #E02207;
    }

        .action-product .action-2:hover {
            background: #E02207;
            color: white;
        }

.num {
    max-width: 44px;
}
</style>
<div class="container">
<div class="row">
    <h2>Giỏ Hàng</h2>
        <?php 
            if(count($result) > 0){?>
            <div class="col-lg-9 col-md-12 col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên SP</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Xoá</th>
                        </tr>
                    </thead>
                    <?php foreach($result as $each){?>
                        <tbody>
                            <tr>
                                <?php 
                                    $total = 0;
                                    $pro = Product::getById($each->MaSP);
                                    $sl = $each->Quantity;
                                    $temp = $sl * $pro->GiaBan;
                                    $total += $temp;
                                ?>
                                <td><img src="../Image/<?php echo $pro->AnhSP?>" alt="Alternate Text" /></td>
                                <td><a href="../main/detail.php?id=<?php echo $each->MaSP?>"><?php echo $pro->TenSP?></a></td>
                                <td>
                                    <form action="../Handle/update_Quantity.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="MaSP" value="<?php echo $each->MaSP?>" />
                                        <input type="number" class="num" name="Quantity" value="<?php echo $each->Quantity?>" min="1" />
                                        
                                        <button class="btn update" type="submit"></button>
                                    </form>
                                </td>
                                <td><?php echo number_format($pro->GiaBan, 0, ".", ",")?> đ</td>
                                <td><?php echo number_format($temp, 0, ".", ",")?> đ</td>
                                <td>
                                    <form action="../Handle/delete_cart.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="IdCart" value="<?php echo $each->IdCart ?>">
                                        <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php }?>

                </table>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="row">
                    <div class="col-6">Tổng tiền</div>
                    <div class="col-6"><?php echo number_format($total, 0, ".", ",")?> đ</div>
                </div>
                <div class="row action-product">
                    <div class="col-md-4">
                        <a href="./product.php" class="btn action-1">TIẾP TỤC MUA</a>
                      
                    </div>
                    <div class="col-md-6">
                        <form action="../Handle/buy_cart.php" method="post" enctype="multipart/form-data" >
                            <label>THÔNG TIN KHÁCH HÀNG</label>
                           <label>Địa chỉ nhận hàng:</label>
                            <input type="text" name="DiaChiNhanHang" placeholder="Địa chỉ nhận hàng" required>
                            <label>Số điện thoại:</label>
                            <input type="tel" name="SDT" placeholder="Số điện thoại" required>
                            <label>Phương thức thanh toán</label>
                            <select name="ThanhToan" required>
                                <option value="" disabled selected>Chọn phương thức thanh toán</option>
                                <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                                <option value="Thanh toán trực tuyến">Thanh toán trực tuyến</option>
                            </select>  
                            <button class="btn action-2 " type="submit">THANH TOÁN</button>  
                        </form>
                        
                    </div>
                </div>
            </div>
        <?php 
        } else {?>
        <div class="info-none-product">
            <img src="https://theme.hstatic.net/200000420363/1001121558/14/empty_cart.png?v=680" width="30%" />
            <h3>Không có sản phẩm nào trong giỏ hàng</h3>
            <a href="./product.php" class="btn">Quay trở lại trang sản phẩm</a>
        </div>
    <?php }?>
</div>

<!-- Footer -->
<?php include '../include/footer.php'?>

