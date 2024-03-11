<?php 
require '../init.php' ;   
require '../classes/Lichcongtac.php';
include_once '../classes/Chutri.php';
require '../classes/Database.php';
$db = new Database();
$pdo = $db->getConnect();
$IDNguoiTao= $_SESSION['quanly_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Chutri = new Chutri();
    $TenNguoiChuTri = $_POST['TenNguoiChuTri'];
    $ghichu = $_POST['ghichu'];

    $ChutriBuild = $Chutri->create($pdo,$TenNguoiChuTri,$ghichu);
    if ($ChutriBuild) {          
        header("Location: themlichcongtacchung.php");
    } else {
        echo 'Error creating product';
    }
}

?>