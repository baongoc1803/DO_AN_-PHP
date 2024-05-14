<?php
Class DonHang{
    public $MaDH,$NgayDat,$DiaChiNhanHang,$SDT,$ThanhToan,$MaUser,$TongTien;
    public function __construct($MaDH=0,$NgayDat="",$DiaChiNhanHang="",$SDT="",$ThanhToan="",$MaUser=0,$TongTien=0){
        $this->MaDH=$MaDH;
        $this->NgayDat=$NgayDat;
        $this->DiaChiNhanHang = $DiaChiNhanHang;
        $this->SDT = $SDT;
        $this->ThanhToan= $ThanhToan;
        $this->MaUser=$MaUser;
        $this->TongTien=$TongTien;
    }
    public static function getOrder($sql){
        global $pdo;
        $order=$pdo->query($sql);
        $arrOrder = array();
        foreach($order->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $order=new DonHang();
            foreach($row as $key=>$pro){
                $order->{$key}=$row[$key];
            }
            $arrOrder[]=$order;
        }
        return $arrOrder;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `donhang` where MaDH=$id";
        $order=new DonHang();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $order->{$key}=$row[$key];
        }
        return $order;
    }
    public static function insert($NgayDat, $MaUser, $DiaChiNhanHang, $SDT, $ThanhToan) {
        global $pdo;
        $sql = "INSERT INTO `donhang` (`NgayDat`, `MaUser`, `DiaChiNhanHang`, `SDT`, `ThanhToan`, `TongTien`) 
                VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$NgayDat, $MaUser, $DiaChiNhanHang, $SDT, $ThanhToan]);
    }
    
    public static function update($NgayDat,$MaUser,$TongTien,$MaDH){
        global $pdo;
        $sql="UPDATE `donhang` SET `NgayDat`=?,`MaUser`=?,
        `TongTien`=? WHERE `MaDH`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$NgayDat,$MaUser,$TongTien,$MaDH]);
    }
    public static function updatePrice($MaDH,$Total){
        global $pdo;
        $sql="UPDATE `donhang` SET `TongTien`=? WHERE `MaDH`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Total,$MaDH]);
    }
    public static function delete($Id){
        global $pdo;
        $sql="DELETE FROM `donhang` WHERE MaDH=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
}