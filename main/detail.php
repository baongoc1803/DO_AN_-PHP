<?php require "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Connect/Connect.php"?>
<!-- Header -->
<?php include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/header.php";
    require "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Class/Product.php";
    require "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Class/ProductType.php";
?>  
<?php
    $id= $_GET['id'];
    $each=Product::getById($id);
?>
    
<style>
    .detail {
        background-color: LightCyan;
    }

    .menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

        .menu li {
            display: inline-block;
        }

            .menu li img {
                width: 80%;
            }

    .quantity {
        display: flex;
        align-items: center;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
    }

    .blockContent .card-product .card {
        overflow: hidden;
    }

    .blockContent .card-product img {
        height: 250px;
    }

    .blockContent .card-product a {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.5s;
    }

    .blockContent .card-product :hover {
        color: #E02207;
    }

    .col-lg-3 {
        display: inline-block;
    }

    .col-3 .menu-item li a {
        text-decoration: none;
        color: black;
    }
</style>
<div class="container">
<div class="detail">
    <div class="row">
            <div class="col-md-4">
                <div><img class="card-img-top mb-5 mb-md-0" src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each->AnhSP; ?>" /></div>
                <br />
                <ul class="menu">
                <li><img class="card-img-top mb-5 mb-md-0" src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each->AnhSP; ?> "/></li>
                    <li><img class="card-img-top mb-5 mb-md-0" src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each->AnhSP; ?>" /></li>
                    <li><img class="card-img-top mb-5 mb-md-0" src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each->AnhSP; ?>" /></li>
                    <li><img class="card-img-top mb-5 mb-md-0" src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each->AnhSP; ?>" /></li>
                </ul>
            </div>
            <div class="col-md-8">
            <div class="small mb-1">Loại hàng: <?php echo $each->MaLoaiSP?></div>
            <h1 class="display-5 fw-bolder"><?php echo $each->TenSP?> </h1>
            <p>
                    <i class="fas fa-star" style="color: #fbe032;"></i>
                    <i class="fas fa-star" style="color: #fbe032;"></i>
                    <i class="fas fa-star" style="color: #fbe032;"></i>
                    <i class="fas fa-star" style="color: #fbe032;"></i>
                    <i class="fas fa-star" style="color: #fbe032;"></i>
                </p>
                <span>  Giá: <?php echo number_format($each->GiaBan, 0, ".", ",") ?> VNĐ </span>
                <div>
                    <p>Xuất Xứ: Việt Nam</p>
                    <p>Quy trình: Đảm bảo 100% thủ công</p>
                    <p>Chất Liệu: Len Nhung( để xa tầm tay trẻ em dưới 3 tuổi)</p>
                </div>
                Mô tả sản phẩm:
                <p class="lead"> <?php echo $each->MoTa?>  </p>
                <p>Nếu bạn muốn mua sản phẩm thì hãy liên hệ với shop nhé!</p>
                <br />
                <div class="d-flex">
                    
                    <form action="../Handle/insert_cart.php" method="post" enctype="multipart/form-data" class="d-flex">
                        <input type="hidden" name="MaSP" value="<?php echo $each->MaSP ?>">    
                        <button class="btn btn-dark add" type="submit">Thêm vào giỏ hàng</button>
                    </form>

                    </div>
                    </div>
                    <br>
                        <div style="font-size:20px">
                            <a href="#"></a><i class="fab fa-facebook-f" style="color: #030303;"></i> <i class="fab fa-instagram" style="color: #030303;"></i>
                            <i class="fal fa-envelope" style="color: #0c0d0d;"></i> <i class="fas fa-phone-alt" style="color: #111213;"></i>
                    </div>
            </div>
        </div>
        
</div>
<?php 
include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/footer.php";
?>
