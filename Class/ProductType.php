<?php 
Class ProductType{
    public $MaLoaiSP,$TenLoai;
    public function __construct($MaLoaiSP=0,$TenLoai=""){
        $this->MaLoaiSP = $MaLoaiSP;
        $this->TenLoai = $TenLoai;
    }
    public static function getAllProductType($sql){
        global $pdo;
        $type = $pdo->query($sql);
        foreach($type->fetchAll(PDO::FETCH_ASSOC)as $row){
            $type = new ProductType();
            foreach($row as $key=>$pro){
                $type->{$key} = $row[$key];
            }
            $arrType[] = $type;  
        }
        return $arrType;
    }
    public static function insert($TenLoai){
        global $pdo;
        $sql="INSERT INTO `producttype`(`TenLoai`)
        VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenLoai]);
    }
    public static function update($MaLoaiSP,$TenLoai){
        global $pdo;
        $sql="UPDATE `producttype` SET `TenLoai`=? WHERE `MaLoaSP`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenLoai,$MaLoaiSP]);
    }
    public static function delete($MaLoaiSP){
        global $pdo;
        $sql="DELETE FROM `producttype` WHERE MaLoaSP=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaLoaiSP]);
    }
}