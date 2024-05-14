<?php require '../Connect/Connect.php';
    require '../Class/DonHang.php';
    require '../Class/Product.php';
    include '../include/header.php';

?>

<style>
    img {
        width:100px;
    }
    strong {
        color: #E02207;
    }
</style>

<?php 
        $id=$_GET['MaDH'];
        $sql="SELECT chitietdonhang.SoLuong,product.GiaBan,product.AnhSP,product.TenSP FROM `chitietdonhang`,product WHERE product.MaSP = chitietdonhang.MaSP and MaDH=$id";
        $product=Product::getProductsBuy($sql);

        if(count($product)>0){
            $order_info = DonHang::getById($id);
            $DiaChiNhanHang = $order_info->DiaChiNhanHang;
            $SDT = $order_info->SDT;
            $ThanhToan = $order_info->ThanhToan;
?>

    <div class="container">
        <div class="row">
            <div class="col">
            <div><b>THÔNG TIN ĐƠN HÀNG</b></div>
            <div><span>Họ tên: <?php echo $_SESSION['Name']?></span></div>
            <div><span>Địa chỉ nhận hàng: <?php echo $DiaChiNhanHang ?></span></div>
            <div><span>Số điện thoại: <?php echo $SDT ?></span></div>
            <span>Phương thức thanh toán: <?php echo $ThanhToan ?></span>
                <table class="table table-bordered">
                    <?php 
                        $total=0;
                    ?>
                   
                    <?php foreach($product as $each) {?>
                        <tr>
                           
                            <td>
                                <img src="../Image/<?php echo $each->AnhSP?>" style="height:100px;width:100px" class="card-img-top" alt="">
                            </td>
                            <td>
                            Tên sản phẩm:<h5> <?php echo $each->TenSP?></h5>
                                <div><span>Giá : <strong><?php echo number_format($each->GiaBan, 0, ".", ",") ?> đ</strong></span></div>
                                <div><span>Số lượng: <strong><?php echo $each->SoLuong ?></strong></span></div>
                                
                                <?php $total += $each->GiaBan * $each->SoLuong; ?>
                                <span>Thành tiền: <strong><?php echo number_format($each->GiaBan * $each->SoLuong, 0, ".", ",") ?> đ</strong></span>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <h4>Tổng thanh toán: <strong><?php echo number_format($total, 0, ".", ",") ?> đ</strong></h4>
                <?php
                    // update total price
                    DonHang::updatePrice($id,$total);
                ?>
            </div>
        </div>
    </div>
<?php }else{?>
<?php }?>

<?php include '../include/footer.php' ?>
