<?php require '../Connect/Connect.php'; ?>

<?php include '../include/header.php';
    require '../Class/User.php'; ?>
?>
<div class="container">
    <h2>Thông tin của tôi</h2>
    <?php
        if(!empty($_SESSION['Id'])){
            $id=$_SESSION['Id'];
            $each=Users::getById($id);
            
    ?>
    <table class="table table-bordered">
        <tr>
            <td><strong>Tên tài khoản: </strong></td>
            <td><?php echo $each->UserName?></td>
        </tr>
        <tr>
            <td><strong>Email: </strong></td>
            <td><?php echo $each->Email ?></td>
        </tr>
        <tr>
            <td><strong>Họ tên:</strong></td>
            <td><?php echo $each->Name ?></td>
        </tr>
        <tr>
            <td><strong>Địa chỉ:</strong></td>
            <td><?php echo $each->Address ?></td>
        </tr>
    </table>
    <?php
        }else{
            echo "Không có thông tin";
        }
    ?>
</div>

<?php include './includes/footer.php' ?>