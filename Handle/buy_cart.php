<?php
session_start();
require '../Connect/Connect.php';
require '../Class/Cart.php';
require '../Class/DonHang.php';
require '../Class/ChiTietDonHang.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DiaChiNhanHang = $_POST['DiaChiNhanHang'];
    $SDT = $_POST['SDT'];
    $ThanhToan = $_POST['ThanhToan'];

    // Kiểm tra đăng nhập
    if (!empty($_SESSION['Id'])) {
        $IdUser = $_SESSION['Id'];

        $sql = "SELECT * FROM `cart` WHERE IdUser=$IdUser";
        $arrCart = Cart::getCart($sql);

        if (count($arrCart) > 0) {
            // Tạo đơn hàng
            $dayNow = date("Y-m-d");
            DonHang::insert($dayNow, $IdUser, $DiaChiNhanHang, $SDT,  $ThanhToan);

            // Lấy mã đơn hàng vừa tạo
            $selectOrder = "SELECT MaDH FROM `donhang` WHERE NgayDat='$dayNow' and MaUser=$IdUser ORDER BY MaDH DESC LIMIT 1";
            $order = DonHang::getOrder($selectOrder);
            $MaDH = $order[0]->MaDH;

            // Thêm chi tiết đơn hàng
            foreach ($arrCart as $each) {
                $maSP = $each->MaSP;
                $soLuong = $each->Quantity;
                ChiTietDonHang::insert($MaDH, $maSP, $soLuong);
            }

            // Xóa giỏ hàng sau khi tạo đơn hàng thành công
            Cart::deleteAllByUser($IdUser);

            // Chuyển hướng đến trang xác nhận đơn hàng với mã đơn hàng
            header("location: ../main/buy.php?MaDH=$MaDH");
            exit;
        } else {
            header("location: ../main/index.php?error=Not found product in cart");
            exit;
        }
    } else {
        header("location: ../main/index.php?error=You are not logged in");
        exit;
    }
} else {
    header("location: ../main/index.php?error=Invalid request method");
    exit;
}
?>
