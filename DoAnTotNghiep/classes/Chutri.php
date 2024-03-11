<?php

use Lichcongtac as GlobalLichcongtac;

class Chutri
{


    public $IDChuTri;
    public $TenNguoiChuTri;
    public $GhiChu ;
   
    public function __construct($IDChuTri = 0,$TenNguoiChuTri = '',$GhiChu = '')
    {
        $this->IDChuTri = $IDChuTri;
        $this->TenNguoiChuTri = $TenNguoiChuTri;
        $this->GhiChu = $GhiChu;
    }
    public static function getAllChuTri($pdo)
    {
        $sql = "SELECT * FROM chutri";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public function create($pdo,$TenNguoiChuTri,$GhiChu)
    {
        
        $sql = "INSERT INTO `chutri`(`TenNguoiChuTri`, `GhiChu`) VALUES (:TenNguoiChuTri,:GhiChu)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':TenNguoiChuTri', $TenNguoiChuTri, PDO::PARAM_STR);
        $stmt->bindValue(':GhiChu', $GhiChu, PDO::PARAM_STR);
        $success = $stmt->execute();
        if ($success) {
            $this->IDChuTri = $pdo->lastInsertId();
        }
        return $success;
    }

}