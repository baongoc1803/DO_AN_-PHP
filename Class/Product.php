<?php
Class Product{
    public $MaSP;
    public $TenSP;
    public $GiaBan;
    public $SoLuong;
    public $MoTa;
    public $MaLoaiSP;
    public $AnhSP;
    public function __construct($MaSP = 0,$TenSP="",$GiaBan=0,$SoLuong=0,$MoTa="",$MaLoaiSP=0,$AnhSP="")
    {
        $this->MaSP=$MaSP;
        $this->TenSP=$TenSP;
        $this->GiaBan=$GiaBan;
        $this->SoLuong=$SoLuong;
        $this->MoTa=$MoTa;
        $this->MaLoaiSP=$MaLoaiSP;
        $this->AnhSP=$AnhSP;      
    }
    public static function getProducts($sql){
        global $pdo;
        $product = $pdo->query($sql);
        foreach($product->fetchAll(PDO::FETCH_ASSOC) as $row){
            $product = new Product();
            foreach($row as $key=>$pro){
                 $product->{$key}= $row[$key];
            }
            $arrProducts[]=$product;
        }
        return $arrProducts;
    }
    public static function getProductsBuy($sql){
        global $pdo;
        $products=$pdo->query($sql);
        $arrProducts=array();
        foreach($products->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $product=new Product();
            foreach($row as $key=>$pro){
                $product->{$key}=$row[$key];
            }
            $product->SoLuong=$row['SoLuong'];
            $product->GiaBan=$row['GiaBan'];
            $product->AnhSP=$row['AnhSP'];
            $product->TenSP=$row['TenSP'];
            $arrProducts[]=$product;
        }
        return $arrProducts;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `product` where MaSP = $id";
        $product=new Product();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $product->{$key}=$row[$key];
        }
        return $product;
    }
    public static function insert($TenSP,$GiaBan,$MoTa,$AnhSP,$SoLuong,$MaLoaiSP){
        global $pdo;
        $folder = '../../Image/';
        $file_extension = explode('.', $AnhSP["name"])[1];
        $file_name = $AnhSP["name"];
        $path_file = $folder . $file_name;
    
        move_uploaded_file($AnhSP["tmp_name"], $path_file);
        $sql="INSERT INTO `product`(`TenSP`, `Gia`, `ThongTinSP`, `Anh`, `SoLuong`, `MaLoaiSP`, `BrandId`) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenSP,$GiaBan,$MoTa,$file_name,$SoLuong,$MaLoaiSP]);
    }
    public static function update($MaSP,$TenSP,$GiaBan,$MoTa,$AnhSP,$SoLuong,$MaLoaiSP,$ImgOld){
        global $pdo;
        $file_name = $AnhSP["name"];

        if(!empty($AnhSP["name"])){
            $folder = '../../Image/';
            $file_extension = explode('.', $AnhSP["name"])[1];
            $file_name = uniqid() . '.' . $file_extension;
            $path_file = $folder . $file_name;
            move_uploaded_file($AnhSP["tmp_name"], $path_file);
        }
        else{
            $file_name=$ImgOld;
        }
        
        $sql="UPDATE `product` SET `TenSP`=?,`Gia`=?,`ThongTinSP`=?,`Anh`=?,`SoLuong`=?,`MaLoaiSP`=?,`BrandId`=? WHERE `MaSP`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenSP,$GiaBan,$MoTa,$AnhSP,$SoLuong,$MaLoaiSP,$MaSP]);
    }
    public static function delete($MaSP){
        global $pdo;
        $MaSP=$_POST['MaSP'];
        $sql="DELETE FROM `product` WHERE MaSP=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaSP]);
    }
    public static function getByCategory($MaLoaiSP){
        global $pdo;
        $sql = "SELECT * FROM `producttype` WHERE MaLoaiSP = :MaLoaiSP";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['producttype' => $MaLoaiSP]);
        $products = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            foreach($row as $key => $value){
                $product->{$key} = $value;
            }
            $products[] = $product;
        }
        
        return $products;
    }
}