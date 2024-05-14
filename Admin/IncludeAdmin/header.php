<?php
require '../Class/Product.php';
require '../Connect/Connect.php';
$sql = "SELECT * FROM `product`";
$result  = Product::getProducts($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="~/Scripts/bootstrap.js"></script>
    <script src="~/Scripts/jquery-3.7.1.js"></script>
    <script src="~/Scripts/jquery.validate.js"></script>
    <script src="~/Scripts/jquery.validate.unobtrusive.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
                    <img src="https://tiemnhalen.com/wp-content/uploads/2023/09/jgs.jpg">
                </div>
                <div class="col-md-5">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Nhập nội dung tìm kiếm" aria-label="Search" style="border-radius: 8px;">
                        <button class="btn btn-outline-success" type="submit"><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <div class="col-md-3 icon">
                    <i class="fal fa-envelope"><h> CONTACT</h></i>
                    <i class="fal fa-clock"><h> 8:00 - 22:00</h></i>
                    <i class="fal fa-shopping-basket"></i>
                </div>
                <div class="col-md-1">
            
                        <div class="dropdown">

                            <button class="btn btn-info-emphasis dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fal fa-user"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-info-emphasis">
                                <li><a class="dropdown-item" href="/Account/Logout">Đăng Xuất</a></li>
                            </ul>
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
                        <div id="sidebar" class="sidebar">
                            <ul>
                                <li><a href="/Admin/Home"> Trang Chủ</a></li>
                                <li><a href="#"> Giới Thiệu</a></li>
                                <li>
                                    <a href="/Admin/SanPham/Index">
                                        Sản Phẩm
                                    </a>
                                </li>
                                <li><a href="/GioHang/MuaHang">Quản Lý Thanh toán</a></li>
                                <li><a href="/Admin/GioHang/GioHangUser"> Giỏ Hàng</a></li>
                                <li><a href="/Admin/User/Index"> Quản Lý Tài Khoản</a></li>
                                <li style="font-size: 20px;">
                                    <i class="fab fa-facebook-f" style="color: #0c0d0d;"> </i> <i class="fas fa-phone-alt" style="color: #111213;"></i>
                                    <i class="fal fa-envelope" style="color: #0c0d0d;"></i> <i class="fas fa-phone-alt" style="color: #111213;"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <button id="sidebar-toggle" class="toggle-button">&#9776;</button>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="col-lg-9">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/Admin/Home/Index">Trang Chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/Admin/SanPham/Index">Giới Thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link active" href="/Admin/SanPham/Index">
                                            Sản Phẩm
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/GioHang/MuaHang">Quản Lý Thanh toán</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/GioHang/GioHang">Quản Lý Giỏ Hàng</a>
                        
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/Admin/User/Index">Quản Lý Tài Khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>