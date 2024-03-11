<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../helpers/format.php');
?>
<?php

use Thongbao as GlobalThongbao;

class Thongbao
{

    private $db;
    private $fm;
    public $IDThongBao;
    public $IDNguoiTao;
    public $IDNhomNguoiNhan ;
    public $IDLoaiThongBao;
    public $NgayTao;
    public $NgayHetHan;
    public $TieuDe;
    public $NoiDung;
    public $ThanhPhan;
    public $TepDinhKem;
    public $IDTrangThai;
    public function __construct($IDThongBao = 0 ,$IDNguoiTao = 0,$IDNhomNguoiNhan = 0,$IDLoaiThongBao=0,$NgayTao = '',$NgayHetHan = '',$TieuDe='',$NoiDung='',$ThanhPhan='',$TepDinhKem='',$IDTrangThai=0)
    {
        $this->db = new Database();
        $this->fm = new Format();
        $this->IDThongBao = $IDThongBao;
        $this->IDNguoiTao = $IDNguoiTao;
        $this->IDNhomNguoiNhan = $IDNhomNguoiNhan;
        $this->IDLoaiThongBao = $IDLoaiThongBao;
        $this->NgayTao = $NgayTao;
        $this->NgayHetHan = $NgayHetHan;
        $this->TieuDe = $TieuDe;
        $this->NoiDung = $NoiDung;
        $this->ThanhPhan = $ThanhPhan;
        $this->TepDinhKem = $TepDinhKem;
        $this->IDTrangThai = $IDTrangThai;
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
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao order by thongbao.IDThongBao desc LIMIT :limit OFFSET :offset ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }

    public static function countAll($pdo)
    {
        $sql = "SELECT COUNT(*) FROM thongbao";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getAllGianVien($pdo)
    {
        $sql = "SELECT * FROM nguoidung where IDChucVu!=5";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getAllLoaiThongBao($pdo)
    {
        $sql = "SELECT * FROM loaithongbao";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
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
    public  function show_Thongbao(){
        $query = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao order by IDThongBao  desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function create($pdo,$IDNguoiTao,$IDNhomNguoiNhan,$IDLoaiThongBao,$NgayTao,$NgayHetHan,$TieuDe,$NoiDung,$ThanhPhan,$file_name,$IDTrangThai)
    {
        
        $sql = "INSERT INTO `thongbao`(`IDNguoiTao`, `IDNhomNguoiNhan`, `IDLoaiThongBao`, `NgayTao`, `NgayHetHan`, `TieuDe`, `NoiDung`, `ThanhPhan`, `TepDinhKem`, `IDTrangThai`)
         VALUES (:IDNguoiTao,:IDNhomNguoiNhan,:IDLoaiThongBao,:NgayTao,:NgayHetHan,:TieuDe,:NoiDung,:ThanhPhan,:TepDinhKem,:IDTrangThai)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiTao', $IDNguoiTao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        $stmt->bindValue(':IDLoaiThongBao', $IDLoaiThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':NgayHetHan', $NgayHetHan, PDO::PARAM_STR);
        $stmt->bindValue(':TieuDe', $TieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':NoiDung', $NoiDung, PDO::PARAM_STR);
        $stmt->bindValue(':ThanhPhan', $ThanhPhan, PDO::PARAM_STR);
        $stmt->bindValue(':TepDinhKem', $file_name, PDO::PARAM_STR);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            $this->IDThongBao = $pdo->lastInsertId();
        }
        return $success;
    }
    public function getLastInsertedId($pdo) {
        return $this->IDThongBao = $pdo->lastInsertId();
    }
    public function create2($pdo,$IDNguoiTao,$IDNhomNguoiNhan,$IDLoaiThongBao,$NgayTao,$NgayHetHan,$TieuDe,$NoiDung,$ThanhPhan,$file_name,$IDTrangThai)
    {
        
        $sql = "INSERT INTO `thongbao`(`IDNguoiTao`, `IDNhomNguoiNhan`, `IDLoaiThongBao`, `NgayTao`, `NgayHetHan`, `TieuDe`, `NoiDung`, `ThanhPhan`, `TepDinhKem`, `IDTrangThai`)
         VALUES (:IDNguoiTao,:IDNhomNguoiNhan,:IDLoaiThongBao,:NgayTao,:NgayHetHan,:TieuDe,:NoiDung,:ThanhPhan,:TepDinhKem,:IDTrangThai)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiTao', $IDNguoiTao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        $stmt->bindValue(':IDLoaiThongBao', $IDLoaiThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':NgayHetHan', $NgayHetHan, PDO::PARAM_STR);
        $stmt->bindValue(':TieuDe', $TieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':NoiDung', $NoiDung, PDO::PARAM_STR);
        $stmt->bindValue(':ThanhPhan', $ThanhPhan, PDO::PARAM_STR);
        $stmt->bindValue(':TepDinhKem', $file_name, PDO::PARAM_STR);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            $this->IDThongBao = $pdo->lastInsertId();
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $success;
        }
        return $success;
    }
    public function createNguoiDungVaoDsXem($pdo,$IDNguoiDung,$IDThongBao,$IDTrangThai)
    {
        
        $sql = "INSERT INTO `dsgvdaxemthongbao`(`IDNguoiDung`, `IDThongBao`, `IDTrangThai`)
         VALUES (:IDNguoiDung,:IDThongBao,:IDTrangThai)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
        
    }
    public function update($pdo,$IDThongBao,$IDNguoiTao,$IDNhomNguoiNhan,$IDLoaiThongBao,$NgayTao,$NgayHetHan,$TieuDe,$NoiDung,$ThanhPhan,$file_name,$IDTrangThai)
    {
        
                $sql = "UPDATE thongbao 
                SET thongbao.IDNguoiTao = :IDNguoiTao, 
                thongbao.IDNhomNguoiNhan = :IDNhomNguoiNhan, 
                thongbao.IDLoaiThongBao = :IDLoaiThongBao, 
                thongbao.NgayTao = :NgayTao, 
                thongbao.NgayHetHan = :NgayHetHan, 
                thongbao.TieuDe = :TieuDe, 
                thongbao.NoiDung = :NoiDung, 
                thongbao.ThanhPhan = :ThanhPhan, 
                thongbao.TepDinhKem = :TepDinhKem, 
                thongbao.IDTrangThai = :IDTrangThai
                WHERE thongbao.IDThongBao = :IDThongBao";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNguoiTao', $IDNguoiTao, PDO::PARAM_INT);
        $stmt->bindValue(':IDNhomNguoiNhan', $IDNhomNguoiNhan, PDO::PARAM_INT);
        $stmt->bindValue(':IDLoaiThongBao', $IDLoaiThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':NgayTao', $NgayTao, PDO::PARAM_STR);
        $stmt->bindValue(':NgayHetHan', $NgayHetHan, PDO::PARAM_STR);
        $stmt->bindValue(':TieuDe', $TieuDe, PDO::PARAM_STR);
        $stmt->bindValue(':NoiDung', $NoiDung, PDO::PARAM_STR);
        $stmt->bindValue(':ThanhPhan', $ThanhPhan, PDO::PARAM_STR);
        $stmt->bindValue(':TepDinhKem', $file_name, PDO::PARAM_STR);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            return true;
        }
        
    }
    public static function getOneByID($pdo, $IDThongBao)
    {
        // $sql = "SELECT product.*, brand.BrandName FROM product INNER JOIN brand ON product.BrandID = brand.BrandID WHERE product.ProductID = :ProductID";
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.IDThongBao = :IDThongBao";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);

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

    public static function updateSoThongBao($pdo,$IDNguoiDung,$IDThongBao,$IDTrangThai)
    {
        
                $sql = "UPDATE dsgvdaxemthongbao 
                SET IDTrangThai= :IDTrangThai
                WHERE IDNguoiDung= :IDNguoiDung and IDThongBao=:IDThongBao";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':IDTrangThai', $IDTrangThai, PDO::PARAM_INT);
        $success = $stmt->execute();
        if ($success) {
            return true;
        }
        
    }
    public static function DemThongBaoChuaXem($pdo,$IDNguoiDung)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemthongbao WHERE IDNguoiDung=:IDNguoiDung and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function DemNguoiDungChuaXem($pdo,$IDThongBao)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemthongbao WHERE IDThongBao=:IDThongBao and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getAllNguoiDungChuaXem($pdo,$IDThongBao)
    {
        $sql = "SELECT * FROM dsgvdaxemthongbao,nguoidung,phongban WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDThongBao=:IDThongBao and IDTrangThai=2";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageAllNguoiDungChuaXem($pdo,$IDThongBao, $limit, $offset)
    {
        $sql = "SELECT * FROM dsgvdaxemthongbao,nguoidung,phongban WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDThongBao=:IDThongBao and IDTrangThai=2 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function getAllNguoiDungDaXem($pdo,$IDThongBao)
    {
        $sql = "SELECT * FROM dsgvdaxemthongbao,nguoidung,phongban WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDThongBao=:IDThongBao and IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function DemNguoiDungDaXem($pdo,$IDThongBao)
    {
        $sql = "SELECT COUNT(*) FROM dsgvdaxemthongbao WHERE IDThongBao=:IDThongBao and IDTrangThai=1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchColumn();
        }
    }
    public static function getPageAllNguoiDungDaXem($pdo,$IDThongBao, $limit, $offset)
    {
        $sql = "SELECT * FROM dsgvdaxemthongbao,nguoidung,phongban WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
        AND nguoidung.IDPhongBan = phongban.IDPhongBan and IDThongBao=:IDThongBao and IDTrangThai=1 LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $thongbao= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $thongbao;
            return $data;
        }
    }
    public static function KiemTraNguoiDungDaXem($pdo,$IDNguoiDung,$IDThongBao)
    {
        
                $sql = "SELECT COUNT(*) AS count FROM dsgvdaxemthongbao,nguoidung WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
                and nguoidung.IDNguoiDung=:IDNguoiDung and IDThongBao=:IDThongBao and IDTrangThai=1";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $kiemtra = ($result['count'] > 0);
        if ($kiemtra) {
            return true;
        }
        else
            return false;
        
    }
    public static function KiemTraNguoiDungChuaXem($pdo,$IDNguoiDung,$IDThongBao)
    {
        
                $sql = "SELECT COUNT(*) AS count FROM dsgvdaxemthongbao,nguoidung WHERE dsgvdaxemthongbao.IDNguoiDung = nguoidung.IDNguoiDung 
                and nguoidung.IDNguoiDung=:IDNguoiDung and IDThongBao=:IDThongBao and IDTrangThai=2";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
        $stmt->bindValue(':IDThongBao', $IDThongBao, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $kiemtra = ($result['count'] > 0);
        if ($kiemtra) {
            return true;
        }
        else
            return false;
        
    }
    public static function getPageTimKiem($pdo,$tukhoa)
    {
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.NgayTao LIKE :tukhoa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':tukhoa', '%' . $tukhoa . '%', PDO::PARAM_STR);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageTimKiem_TheoTieuDe($pdo,$tukhoa1)
    {
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.TieuDe LIKE :tukhoa1 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':tukhoa1', '%' . $tukhoa1 . '%', PDO::PARAM_STR);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageTimKiem_TheoNoiDung($pdo,$tukhoa2)
    {
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.NoiDung LIKE :tukhoa2 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':tukhoa2', '%' . $tukhoa2 . '%', PDO::PARAM_STR);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageTimKiem_TheoNgayHetHan($pdo,$tukhoa3)
    {
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.NgayHetHan LIKE :tukhoa3 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':tukhoa3', '%' . $tukhoa3 . '%', PDO::PARAM_STR);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getPageTimKiem_TheoNguoiTao($pdo,$tukhoa4)
    {
        $sql = "SELECT * FROM thongbao,nguoidung,loaithongbao WHERE thongbao.IDNguoiTao=nguoidung.IDNguoiDung and thongbao.IDLoaiThongBao = loaithongbao.IDLoaiThongBao and thongbao.IDNguoiTao = nguoidung.IDNguoiDung and thongbao.IDNguoiTao  LIKE :tukhoa4 ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':tukhoa4', '%' . $tukhoa4 . '%', PDO::PARAM_STR);

        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public function show_GV(){
        $query = "SELECT * FROM nguoidung where IDChucVu  IN (1, 2, 3)   order by IDNguoiDung desc ";
        $result = $this->db->select($query);
        return $result;
    }

}