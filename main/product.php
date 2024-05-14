<?php
    include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/header.php";
    require '/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Connect/connect.php';
    require '/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Class/Product.php';
    require '/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Class/ProductType.php';
    $pages = 1;
    
    if(isset($_GET['pages'])){
        $pages = $_GET['pages'];
    }
    $search = "";
    $MaLoaiSP = "";
    if(!empty($_GET['producttype'])){
        $MaLoaiSP=$_GET['producttype'];

    }
    if(empty($_GET['search']))
    {
        $sql1= "SELECT * FROM `product`";
        if(!empty($MaLoaiSP))
            $sql1= "SELECT * FROM `product` WHERE MaLoaiSP ='$MaLoaiSP'";
    }
    else{
        $search=$_GET['search'];
        $sql1= "SELECT * FROM `product` WHERE TenSP LIKE '%$search%'";
        if(!empty($MaLoaiSP))
            $sql1= "SELECT * FROM `product` WHERE TenSP LIKE '%$search%' and MaLoaiSP ='$MaLoaiSP'";
    }
    $sort="";
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }
    if(!empty($sort)){
        if($sort==="name"){
            $sql1.=" ORDER BY TenSP ";
        }else if($sort==="price"){
            $sql1.=" ORDER BY GiaBan ";
        }else if($sort==="priceDesc"){
            $sql1.=" ORDER BY GiaBan DESC ";
        }else if($sort==="type"){
            $sql1.=" ORDER BY MaLoaiSP ";
        }
        else if($sort==="quanlity"){
            $sql1.=" ORDER BY SoLuong ";
        }
        else if($sort==="quanlityDesc"){
            $sql1.=" ORDER BY SoLuong DESC";
        }

    }
    $result=Product::getProducts($sql1);
    $rowCount=count($result);
    if($rowCount>4){
        $num_product=8;
        $num_page=ceil($rowCount/$num_product);
        $skip_pages=$num_product*($pages-1);
        $sql1.=" limit $num_product offset $skip_pages";
        $result=Product::getProducts($sql1);
     
    }
    $sql2= "SELECT * FROM `producttype`";
    $result= mysqli_query($conn,$sql1);
    $productType= mysqli_query($conn,$sql2);

?>

<style>
    h2 {
        font-size: 15px;
    }

    .menu-card {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

        .menu-card li a {
            display: inline-block;
        }

        .menu-card li img {
            width: 80%;
        }

    .li-child a {
        text-decoration: none;
        color: black;
    }

    .li-child {
        list-style-type: none;
        font-size: 16px;
    }

    .list-menu {
        background-color: OldLace;
    }
</style>
<div class=" container heading">
    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-7">
        <div class="dropdown">
    <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Vui lòng chọn sắp xếp
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=type">Sắp xếp theo loại hàng</a></li>
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=name">Sắp xếp theo tên</a></li>
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=price">Sắp xếp theo giá tăng dần</a></li>
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=priceDesc">Sắp xếp theo giá giảm dần</a></li>
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=quanlity">Sắp xếp theo số lượng</a></li>
        <li><a class="dropdown-item" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $pages ?>&sort=quanlityDesc">Sắp xếp theo số lượng giảm dần</a></li>
    </ul>
</div>

    </div>
</div>
<div class="container list-menu">
    <div class="row"> 
        <div class="col-md-4">
            <div class="nav-sidebar">
                <a class="product__link" href="">DANH MỤC SẢN PHẨM</a>
                <div class="nav-sidebar__list">
                    <?php foreach($productType as $each){ 
                    global $MaLoaiSP;?>
                        <li class="li-child">
                            <a href="./product.php?search=<?php echo $search?>&producttype=<?php echo $each['MaLoaiSP'] ?>">
                                <span style="font-size:22px;color:firebrick"><?php echo $each['TenLoai']?></span>
                            </a>
                        </li>
                    <?php }?>  
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3> Các sản phẩm nhà Len </h3>
            <div class="container">
                <div class="row row-cols-md-4 justify-content-center"> 
                <?php if($rowCount>0) {?>     
                <?php foreach($result as $each){ ?> 
                    <div class="col-lg-3 col-md-4 col-4"> 
                        <div class="card-product">
                            <div class="card">
                                <img src="/2001215986_NguyenThiBaoNgoc_DoAn/Image/<?php echo $each['AnhSP']?>" class="card-img-top" alt="">
                                <div class="card-body">
                                    <a href="#"><?php echo $each['TenSP'];?></a>
                                    <div style="color: red;"><?php echo number_format($each['GiaBan'], 0, ".", ",")?> đ</div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <p>
                                            <i class="far fa-star" style="color: #FFD43B;font-size: 15px;"></i>
                                            <i class="far fa-star" style="color: #FFD43B;font-size: 15px;"></i>
                                            <i class="far fa-star" style="color: #FFD43B;font-size: 15px;"></i>
                                            <i class="far fa-star" style="color: #FFD43B;font-size: 15px;"></i>
                                            <i class="far fa-star" style="color: #FFD43B;font-size: 15px;"></i>
                                        </p>
                                        <div class="text-center">
                                            <a href="/2001215986_NguyenThiBaoNgoc_DoAn/main/detail.php?id=<?php echo $each['MaSP'];?>" class="btn btn-outline-success">Xem chi tiết</a>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?> 
                <?php
                if($rowCount>0){
                    $PrevPage = intval($pages) - 1;
                    if ($PrevPage <= 1)
                    {
                        $PrevPage = 1;
                    }
                    $NextPage = intval($pages) + 1;
                    if ($NextPage > $num_page)
                    {
                        $NextPage = $num_page;
                    }
                    
            ?>
             <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $PrevPage ?>&sort=<?php $sort?>">Pre</a>
                    </li>
                    <?php for($i = 1; $i <= $num_page; $i++){?>
                        <li class="page-item">
                            <a class="page-link" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $i ?>&sort=<?php $sort?>"><?php echo $i?></a>
                        </li>
                    <?php }?>
                    <li class="page-item">
                        <a class="page-link" href="./product.php?search=<?php echo $search?>&producttype=<?php echo $MaLoaiSP ?>&pages=<?php echo $NextPage ?>&sort=<?php $sort?>">Next</a>
                    </li>
                </ul>
            <?php }
            }else{
                echo "<h2>Không tìm thấy sản phẩm</h2>";
            } ?>                             
            </div>
        </div>
    </div>
</div>
<?php 
include "/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/include/footer.php";
?>