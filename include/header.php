<?php
ob_start();
require '/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Connect/connect.php';


    $sql2= "SELECT * FROM `producttype`";
    $productType= mysqli_query($conn,$sql2);
    session_start();
    $search="";
    $pages;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .title {
            background-color: #ecad55;
            text-align: center;
            color: antiquewhite;
            height: 30px;
        }
        img{
            width: 40%;
        }
        .fal {
            color: #ecad55;
        }

        .icon .fal {
            font-size: 18px;
      
        }
        .col-md-1 .fal {
            font-size: 18px;
           
        }
        .icon .fal h {
                color: black;
        }
        .sidebar {
            width: 200px;
            height: 100%;
            background-color: #F5DEB3;
            position: fixed;
            left: 0;
            top: 0;
            transition: transform 0.3s ease-in-out;
            transform: translateX(-200px);
            z-index: 999;    
        }

        .sidebar ul {
            list-style-type: none;
            padding: 28px;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: darkslateblue;
        }

        ul li a:hover {
            color: #ecad55;
        }

        .content {
            padding: 16px;
        }

        .toggle-button {
            font-size: 24px;
            cursor: pointer;
            display: block;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 999;
            border: none;
            background-color: transparent;
        }

        .toggle-button:focus {
                outline: none;
        }

        .sidebar-open {
            transform: translateX(0);
        }
        .sidebar .menu-product {
            position: absolute;
            left: 120px;
            top: 150px;
            background-color: white;
            color: thistle;
            display: none;
            border-radius: 8px;
        }

        .sidebar li:hover .menu-product {
            display: block;
        }

        .footer {
            background-color: NavajoWhite;
        }

        .row .col-4 ul li {
            list-style-type: none;
        }
        .btn-info-emphasis::after {
            display: none;
        }   

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .dropdown-icon {
            cursor: pointer;
        }
        .dropdown-item a{
            text-decoration: none;
            color:	#7B68EE;
        }

    </style>
</head>

<body>
<div class="container"> <div class="title col-md-12"><p>TIỆM NHÀ LEN-ĐAN CẢM XÚC-ĐAN NIỀM TIN</p></div></div>
    <div class="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/logo.jpg">
                </div>
                <div class="col-md-5">
                <form action="../main/product.php" class="d-flex">
                <input class="form-control" type="search" name="search" value="" placeholder="Tìm kiếm" aria-label="Search">
                        <button type="submit" class="btn btn-outline-dark mx-2"><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <div class="col-md-3 icon">
                    <i class="fal fa-envelope"><h> CONTACT</h></i>
                    <i class="fal fa-clock"><h> 8:00 - 22:00</h></i>
                    <a href="../main/cart.php"> <i class="fal fa-shopping-basket"></i></a>
                </div>
                <div class="col-md-1">
                <div class="dropdown">
                <i class="fal fa-user dropdown-icon"></i>
                    <div class="dropdown-content">
                    <a href="../main/information.php">
                        <?php if(!empty($_SESSION['Id'])){ ?>
                        <a href="./logout.php">
                            <div><?php echo $_SESSION['Name'];?><div>
                            <span class="item-nav">Đăng xuất</span>
                        </a>
                <?php } else { ?>     
                    <a href="./login.php">Đăng Nhập</a>
                    <a href="./register.php">Đăng Ký</a>
                <?php } ?>

                
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-light-subtle">
                <div class="container-fluid">
                    <div id = "sidebar" class="sidebar">
                        <ul>
                            <li><a href = "index.php" > Trang Chủ</a></li>
                            <li><a href = "/Home/About">Giới Thiệu</a></li>
                            <li>
                                <a href = "product.php" >
                                    Sản Phẩm
                                </a>
                                <ul class="menu-product" style="border:#ecad55 solid">
                                <?php foreach($productType as $each){?>
                                        <li class="li-child">
                                            <a href="./product.php?search=<?php echo $search?>&producttype=<?php echo $each['MaLoaiSP'] ?>">
                                                <span><?php echo $each['TenLoai']?></span>                         
                                            </a>
                                        </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <li><a href = "index.php" > Liên Hệ</a></li>
                            <li><a href = "../main/cart.php" > Giỏ Hàng</a></li>
                           
                            <li style="font-size: 20px;">
                                <i class="fab fa-facebook-f" style="color: #0c0d0d;"> </i> <i class="fas fa-phone-alt" style="color: #111213;"></i>
                                <i class="fal fa-envelope" style="color: #0c0d0d;"></i> <i class="fas fa-phone-alt" style="color: #111213;"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <button id = "sidebar-toggle" class="toggle-button">&#9776;</button>
                </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col-lg-9">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Trang Chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">Giới Thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle active" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="product.php">
                                            <span>Sản Phẩm</span>
                                        </a>
                                        <ul class="dropdown-menu" style="border:#ecad55 solid">
                                            <?php foreach($productType as $each){?>    
                                                <li class="dropdown-item"><a href="./product.php?search=<?php echo $search?>&producttype=<?php echo $each['MaLoaiSP'] ?>">
                                                        <span><?php echo $each['TenLoai']?></span>                         
                                                    </a></li>
                                            <?php }?>   
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/Home/Index">Liên Hệ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="../main/cart.php">Giỏ Hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        
    </div>
    <script>
        var sidebarToggle = document.getElementById('sidebar-toggle');
        var sidebar = document.getElementById('sidebar');
        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar-open');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
