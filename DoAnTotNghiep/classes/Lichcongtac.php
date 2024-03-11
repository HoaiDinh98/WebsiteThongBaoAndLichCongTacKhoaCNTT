<?php

use Lichcongtac as GlobalLichcongtac;

class Lichcongtac
{


    public $IDLichCongTac;
    public $IDNguoiTao;
    public $IDNhomNguoiNhan ;
    public $IDChuTri;
    public $NgayTao;
    public $NgayHetHan;
    public $GioBatDau;
    public $GioKetThuc;
    public $TieuDe;
    public $NoiDung;
    public $DiaDiem;
    public $GhiChu;
    public $IDTrangThai;
    public $KetQua;    
    public function __construct($IDLichCongTac = 0 ,$IDNguoiTao = 0,$IDNhomNguoiNhan = 0,$IDChuTri = 0,$NgayTao = '',$NgayHetHan = '',$GioBatDau = '',$GioKetThuc='',$TieuDe='',$NoiDung='',$DiaDiem='',$GhiChu='',$IDTrangThai=0,$KetQua='')
    {
        $this->IDLichCongTac = $IDLichCongTac;
        $this->IDNguoiTao = $IDNguoiTao;
        $this->IDNhomNguoiNhan = $IDNhomNguoiNhan;
        $this->IDChuTri = $IDChuTri;
        $this->NgayTao = $NgayTao;
        $this->NgayHetHan = $NgayHetHan;
        $this->GioBatDau = $GioBatDau;
        $this->GioKetThuc = $GioKetThuc;
        $this->TieuDe = $TieuDe;
        $this->NoiDung = $NoiDung;
        $this->DiaDiem = $DiaDiem;
        $this->GhiChu = $GhiChu;
        $this->IDTrangThai = $IDTrangThai;
        $this->KetQua = $KetQua;
    }


    public static function getALL($pdo){
        
        $sql = "SELECT DISTINCT * FROM thongbao  ";
        $stmt = $pdo->prepare($sql);
        
        
        if($stmt->execute()){
            $thongbao = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            
        }
        else{
            $error = $stmt->errorInfo();
            var_dump($error);
        }
        return $data;
    }
    public static function getPage($pdo, $limit, $offset)
    {
        $sql = "SELECT * FROM lichcongtac,nguoidung,chutri WHERE lichcongtac.IDNguoiTao=nguoidung.IDNguoiDung and lichcongtac.IDChuTri = chutri.IDChuTri LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getPageCaNhan($pdo,$IDNguoiDung,$limit, $offset)
    {
        $sql = "SELECT * FROM lichcongtac,nguoidung,chutri WHERE lichcongtac.IDNguoiTao=nguoidung.IDNguoiDung and lichcongtac.IDChuTri = chutri.IDChuTri LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getDay($pdo, $day)
    {
        $sql = "SELECT lichcongtac.*,lichcongtac.GhiChu AS gc,chutri.*,nguoidung.*,danhsachgvnhan.TenNhom as tn  
        FROM lichcongtac,nguoidung,chutri,danhsachgvnhan 
        WHERE lichcongtac.IDNguoiTao=nguoidung.IDNguoiDung 
        and lichcongtac.IDChuTri = chutri.IDChuTri
        and lichcongtac.IDNhomNguoiNhan = danhsachgvnhan.IDNhomGV  and lichcongtac.NgayTao = :day ORDER BY GioBatDau ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    // public static function getDay($pdo, $day)
    // {
    //     $sql = "SELECT lichcongtac.*,lichcongtac.GhiChu AS gc,chutri.*,nguoidung.*  FROM lichcongtac,nguoidung,chutri WHERE lichcongtac.IDNguoiTao=nguoidung.IDNguoiDung and lichcongtac.IDChuTri = chutri.IDChuTri  and lichcongtac.NgayTao = :day ORDER BY GioBatDau ASC";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindValue(':day', $day, PDO::PARAM_STR);
    //     if ($stmt->execute()) {
    //         $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         $data = $thongbao;
    //         return $data;
    //     }
    // }
    public static function getDayCaNhan($pdo,$IDNguoiDung, $day)
    {
//         $sql = "SELECT DISTINCT lichcongtac.*,lichcongtac.GhiChu AS gc,chutri.*,nguoidung.*
//         FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan,lichcongtac,nguoidung,chutri
//         WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
//         and lichcongtac.IDChuTri = chutri.IDChuTri
//         and chitietdanhsachgvnhan.IDNhomGV != lichcongtac.IDNhomNguoiNhan
//         and nguoidung.IDNguoiDung=:IDNguoiDung
//  and lichcongtac.NgayTao = :day ORDER BY GioBatDau ASC";
$sql="SELECT DISTINCT lichcongtac.*,lichcongtac.GhiChu AS gc,chutri.*,nguoidung.* 
FROM lichcongtac,nguoidung,danhsachgvnhan,chitietdanhsachgvnhan,chutri 
        WHERE lichcongtac.IDNhomNguoiNhan = danhsachgvnhan.IDNhomGV 
        and chitietdanhsachgvnhan.IDNhomGV = danhsachgvnhan.IDNhomGV 
        and chitietdanhsachgvnhan.IDNguoiDung = nguoidung.IDNguoiDung
        and lichcongtac.IDChuTri = chutri.IDChuTri
        and nguoidung.IDNguoiDung=:IDNguoiDung
        and lichcongtac.NgayTao = :day ORDER BY GioBatDau ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getNhomNguoiNhan($pdo, $IDNhomNguoiNhan)
    {
        $sql = "SELECT DISTINCT chitietdanhsachgvnhan.IDNguoiDung,nguoidung.HoTen FROM lichcongtac,nguoidung,danhsachgvnhan,chitietdanhsachgvnhan 
        WHERE lichcongtac.IDNhomNguoiNhan = danhsachgvnhan.IDNhomGV and danhsachgvnhan.IDNhomGV= :IDNhomNguoiNhan
        and chitietdanhsachgvnhan.IDNhomGV = danhsachgvnhan.IDNhomGV and chitietdanhsachgvnhan.IDNguoiDung = nguoidung.IDNguoiDung";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function DemNhomNguoiNhan($pdo, $IDNhomNguoiNhan)
    {
        $sql = "SELECT DISTINCT COUNT(*) FROM lichcongtac,nguoidung,danhsachgvnhan,chitietdanhsachgvnhan 
        WHERE lichcongtac.IDNhomNguoiNhan = danhsachgvnhan.IDNhomGV and danhsachgvnhan.IDNhomGV= :IDNhomNguoiNhan
        and chitietdanhsachgvnhan.IDNhomGV = danhsachgvnhan.IDNhomGV and chitietdanhsachgvnhan.IDNguoiDung =nguoidung.IDNguoiDung";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }

    public static function getDayDistrit($pdo)
    {
        $sql = "SELECT DISTINCT NgayTao FROM `lichcongtac` WHERE 1";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getDayDistritCount($pdo,$day)
    {
        $sql = "SELECT DISTINCT COUNT(*) FROM lichcongtac WHERE lichcongtac.NgayTao=:day";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getDayDistritCountCaNhan($pdo,$IDNguoiDung,$day)
    {
        $sql = "SELECT DISTINCT COUNT(*) FROM lichcongtac,nguoidung,danhsachgvnhan,chitietdanhsachgvnhan,chutri 
        WHERE lichcongtac.IDNhomNguoiNhan = danhsachgvnhan.IDNhomGV 
        and chitietdanhsachgvnhan.IDNhomGV = danhsachgvnhan.IDNhomGV 
        and chitietdanhsachgvnhan.IDNguoiDung = nguoidung.IDNguoiDung
        and lichcongtac.IDChuTri = chutri.IDChuTri
        and nguoidung.IDNguoiDung=:IDNguoiDung
        and lichcongtac.NgayTao = :day";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function countAll($pdo)
    {
        $sql = "SELECT COUNT(*) FROM lichcongtac";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function countDay($pdo)
    {
        $sql = "SELECT COUNT(*) FROM lichcongtac";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getAllNhomNhan($pdo)
    {
        $sql = "SELECT * FROM danhsachgvnhan";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getAllGianVien($pdo)
    {
        $sql = "SELECT * FROM nguoidung,chucvu where nguoidung.IDChucVu = chucvu.IDChucVu and nguoidung.IDChucVu !=5";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
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
    public function create($pdo,$IDNguoiTao,$IDNhomNguoiNhan,$IDChuTri,$NgayTao,$NgayHetHan,$GioBatDau,$GioKetThuc,$TieuDe,$NoiDung,$DiaDiem,$GhiChu)
    {
        
        $sql = "INSERT INTO `lichcongtac`(`IDNguoiTao`, `IDNhomNguoiNhan`, `IDChuTri`, `NgayTao`, `NgayHetHan`, `GioBatDau`, `GioKetThuc`, `TieuDe`, `NoiDung`, `DiaDiem`, `GhiChu`)
         VALUES (:IDNguoiTao,:IDNhomNguoiNhan,:IDChuTri,:NgayTao,:NgayHetHan,:GioBatDau,:GioKetThuc,:TieuDe,:NoiDung,:DiaDiem,:GhiChu)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiTao', $IDNguoiTao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        $stmt->bindValue(':IDChuTri', $IDChuTri, PDO::PARAM_INT);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':NgayHetHan', $NgayHetHan, PDO::PARAM_STR);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':GioBatDau', $GioBatDau, PDO::PARAM_STR);
        $stmt->bindValue(':GioKetThuc', $GioKetThuc, PDO::PARAM_STR);
        $stmt->bindValue(':TieuDe', $TieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':NoiDung', $NoiDung, PDO::PARAM_STR);
        $stmt->bindValue(':DiaDiem', $DiaDiem, PDO::PARAM_STR);
        $stmt->bindValue(':GhiChu', $GhiChu, PDO::PARAM_STR);
        $success = $stmt->execute();
        if ($success) {
            $this->IDLichCongTac = $pdo->lastInsertId();
        }
        return $success;
    }
    public function update($pdo,$IDLichCongTac,$IDNguoiTao,$IDNhomNguoiNhan,$IDChuTri,$NgayTao,$NgayHetHan,$GioBatDau,$GioKetThuc,$TieuDe,$NoiDung,$DiaDiem,$GhiChu,$KetQua)
    {
        
                $sql = "UPDATE lichcongtac 
                SET lichcongtac.IDNguoiTao = :IDNguoiTao, 
                lichcongtac.IDNhomNguoiNhan = :IDNhomNguoiNhan, 
                lichcongtac.IDChuTri = :IDChuTri, 
                lichcongtac.NgayTao = :NgayTao, 
                lichcongtac.NgayHetHan = :NgayHetHan, 
                lichcongtac.GioBatDau = :GioBatDau, 
                lichcongtac.GioKetThuc = :GioKetThuc,
                lichcongtac.TieuDe = :TieuDe, 
                lichcongtac.NoiDung = :NoiDung, 
                lichcongtac.DiaDiem = :DiaDiem, 
                lichcongtac.GhiChu = :GhiChu, 
                lichcongtac.KetQua = :KetQua
                WHERE lichcongtac.IDLichCongTac = :IDLichCongTac";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':IDNguoiTao', $IDNguoiTao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        $stmt->bindValue(':IDChuTri', $IDChuTri, PDO::PARAM_INT);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':NgayHetHan', $NgayHetHan, PDO::PARAM_STR);
        $stmt->bindValue(':GioBatDau', $GioBatDau, PDO::PARAM_STR);
        $stmt->bindValue(':GioKetThuc', $GioKetThuc, PDO::PARAM_STR);
        $stmt->bindValue(':TieuDe', $TieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':NoiDung', $NoiDung, PDO::PARAM_STR);
        $stmt->bindValue(':DiaDiem', $DiaDiem, PDO::PARAM_STR);
        $stmt->bindValue(':GhiChu', $GhiChu, PDO::PARAM_STR);
        $stmt->bindValue(':KetQua', $KetQua, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            return true;
        }
        
    }
    public function getLastInsertedId($pdo) {
        return $this->IDLichCongTac = $pdo->lastInsertId();
    }
    public function createNguoiDungVaoDsXem($pdo,$IDNguoiDung,$IDLichCongTac,$IDTrangThai)
    {
        
        $sql = "INSERT INTO `dsgvdaxemlichcongtac`(`IDNguoiDung`, `IDLichCongTac`, `IDTrangThai`)
         VALUES (:IDNguoiDung,:IDLichCongTac,:IDTrangThai)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
        
    }

    public static function getOneByID($pdo, $IDLichCongTac)
    {
        // $sql = "SELECT product.*, brand.BrandName FROM product INNER JOIN brand ON product.BrandID = brand.BrandID WHERE product.ProductID = :ProductID";
        $sql = "SELECT lichcongtac.*,lichcongtac.GhiChu AS gc,chutri.*,nguoidung.*  FROM lichcongtac,nguoidung,chutri WHERE lichcongtac.IDNguoiTao=nguoidung.IDNguoiDung and lichcongtac.IDChuTri = chutri.IDChuTri and lichcongtac.IDLichCongTac = :IDLichCongTac";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);

        // if ($stmt->execute()) {
        //     $stmt->setFetchMode(PDO::FETCH_CLASS, 'thongbao');
        //     return $stmt->fetch();
        // }
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }

    public static function updateSoLichCongTac($pdo,$IDNguoiDung,$IDLichCongTac,$IDTrangThai)
    {
        
                $sql = "UPDATE dsgvdaxemlichcongtac 
                SET IDTrangThai= :IDTrangThai
                WHERE IDNguoiDung= :IDNguoiDung and IDLichCongTac =:IDLichCongTac";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac',$IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            return true;
        }
        
    }

    public static function DemThongBaoChuaXem($pdo,$IDNguoiDung)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemlichcongtac WHERE IDNguoiDung=:IDNguoiDung and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function DemNguoiDungChuaXem($pdo,$IDLichCongTac)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemlichcongtac WHERE IDLichCongTac=:IDLichCongTac and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function DemNguoiDungChuaXem2($pdo,$IDNhomGV,$IDLichCongTac)
    {
        $sql = "SELECT COUNT(*) 
        FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan
        WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
        and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
        and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
        and dsgvdaxemlichcongtac.IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getAllNguoiDungChuaXem($pdo,$IDLichCongTac)
    {
        $sql = "SELECT * FROM dsgvdaxemlichcongtac,nguoidung,phongban WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDLichCongTac=:IDLichCongTac and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageAllNguoiDungChuaXem($pdo,$IDLichCongTac, $limit, $offset)
    {
        $sql = "SELECT * FROM dsgvdaxemlichcongtac,nguoidung,phongban WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDLichCongTac=:IDLichCongTac and IDTrangThai=2 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getPageAllNguoiDungChuaXem2($pdo,$IDNhomGV,$IDLichCongTac, $limit, $offset)
    {
        $sql = "SELECT *
        FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan,nguoidung,phongban
        WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
         and dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
         and nguoidung.IDPhongBan = phongban.IDPhongBan
        and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
        and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
        and dsgvdaxemlichcongtac.IDTrangThai=2 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getAllNguoiDungDaXem($pdo,$IDLichCongTac)
    {
        $sql = "SELECT * FROM dsgvdaxemlichcongtac,nguoidung,phongban WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDLichCongTac=:IDLichCongTac and IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getAllNguoiDungDaXem2($pdo,$IDNhomGV,$IDLichCongTac)
    {
        $sql = "SELECT *
        FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan,nguoidung,phongban
        WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
         and dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
         and nguoidung.IDPhongBan = phongban.IDPhongBan
        and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
        and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
        and dsgvdaxemlichcongtac.IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function DemNguoiDungDaXem($pdo,$IDLichCongTac)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemlichcongtac WHERE IDLichCongTac=:IDLichCongTac and IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function DemNguoiDungDaXem2($pdo,$IDNhomGV,$IDLichCongTac)
    {
        $sql = "SELECT COUNT(*) 
        FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan
        WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
        and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
        and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
        and dsgvdaxemlichcongtac.IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getPageAllNguoiDungDaXem($pdo,$IDLichCongTac, $limit, $offset)
    {
        $sql = "SELECT * FROM dsgvdaxemlichcongtac,nguoidung,phongban WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDLichCongTac=:IDLichCongTac and IDTrangThai=1 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getPageAllNguoiDungDaXem2($pdo,$IDNhomGV,$IDLichCongTac, $limit, $offset)
    {
        $sql = "SELECT *
        FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan,nguoidung,phongban
        WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
         and dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
         and nguoidung.IDPhongBan = phongban.IDPhongBan
        and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
        and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
        and dsgvdaxemlichcongtac.IDTrangThai=1 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function KiemTraNguoiDungDaXem($pdo,$IDNguoiDung,$IDLichCongTac)
    {
        
                $sql = "SELECT COUNT(*) AS count FROM dsgvdaxemlichcongtac,nguoidung WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
                and nguoidung.IDNguoiDung=:IDNguoiDung and IDLichCongTac=:IDLichCongTac and IDTrangThai=1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $kiemtra = ($result['count'] > 0);
        if ($kiemtra) {
            return true;
        }
        else
            return false;
        
    }
    public static function KiemTraNguoiDungChuaXem($pdo,$IDNguoiDung,$IDLichCongTac)
    {
        
                $sql = "SELECT COUNT(*) AS count FROM dsgvdaxemlichcongtac,nguoidung WHERE dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
                and nguoidung.IDNguoiDung=:IDNguoiDung and IDLichCongTac=:IDLichCongTac and IDTrangThai=2";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $kiemtra = ($result['count'] > 0);
        if ($kiemtra) {
            return true;
        }
        else
            return false;
        
    }
    public static function KiemTraNguoiDungChuaXem2($pdo,$IDNguoiDung,$IDNhomGV,$IDLichCongTac)
    {
        
                $sql = "SELECT COUNT(*) AS count
                FROM dsgvdaxemlichcongtac,chitietdanhsachgvnhan,nguoidung
                WHERE  dsgvdaxemlichcongtac.IDNguoiDung = chitietdanhsachgvnhan.IDNguoiDung
                 and dsgvdaxemlichcongtac.IDNguoiDung = nguoidung.IDNguoiDung 
                and nguoidung.IDNguoiDung=:IDNguoiDung
                and chitietdanhsachgvnhan.IDNhomGV =:IDNhomGV
                and dsgvdaxemlichcongtac.IDLichCongTac=:IDLichCongTac
                and dsgvdaxemlichcongtac.IDTrangThai=2";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomGV', $IDNhomGV, PDO::PARAM_INT);
        $stmt->bindValue(':IDLichCongTac', $IDLichCongTac, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $kiemtra = ($result['count'] > 0);
        if ($kiemtra) {
            return true;
        }
        else
            return false;
        
    }
    public static function TimkiemLichTheoTuan($pdo,$ngayDauTuan,$ngayCuoiTuan) {
        $sql = "SELECT  DISTINCT NgayTao FROM lichcongtac WHERE 1 and lichcongtac.NgayTao BETWEEN :ngayDauTuan AND :ngayCuoiTuan ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':ngayDauTuan', $ngayDauTuan, PDO::PARAM_STR);
        $stmt->bindValue(':ngayCuoiTuan', $ngayCuoiTuan, PDO::PARAM_STR);

         if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }

}