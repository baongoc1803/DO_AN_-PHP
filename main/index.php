<?php 
include "../include/header.php";
?>
<?php
    require '../Connect/connect.php';
    $sql1= "SELECT * FROM `product` WHERE MaLoaiSP = 1";
    $sql2= "SELECT * FROM `product` WHERE MaLoaiSP = 2";
    $sql3= "SELECT * FROM `product` WHERE MaLoaiSP = 3";
    $result1= mysqli_query($conn,$sql1);
    $result2= mysqli_query($conn,$sql2);
    $result3= mysqli_query($conn,$sql3);
    
?>
<style>
    .INTRO {
        text-align: center;
        font-size: 20px;
        margin-top: 2px;
    }

    .col-3 .menu-item li a {
        text-decoration: none;
        color: black;
    }

    .main-slider li {
        display: inline-block;
    }
</style>
<div class="container">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/frist.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/second.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/third.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="INTRO">
        <hr /><i class="fal fa-car-side" style="color: #fb9d50;"> <strong>DANH MỤC SẢN PHẨM</strong></i><hr />
    </div>
    <div class="container">
        <div class="card-group">
            <div class="card">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/Dam_xanh_hong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
            <div class="card">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/bo_hoa_tim_hong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
            <div class="card">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/ao_no_hoa.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
            <div class="card">
                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/tui_tai_dai_trang_xanh.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
include "../include/footer.php";
?>