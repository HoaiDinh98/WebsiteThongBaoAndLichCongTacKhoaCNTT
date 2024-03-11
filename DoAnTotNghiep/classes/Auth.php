<?php

use Auth as GlobalAuth;

class Auth
{
    public $AccountName;
    public $username;
    public $userEmail;
    public $Phone;
    public $address;
    public $password;
    public $role;

    public function Auth()
    {
        
    }

    public function __construct($AccountName = "", $password ="" , $username = "",$userEmail = "" ,$role=0)
       {
           $this->AccountName = $AccountName ;
           $this->username = $username;
           $this->userEmail = $userEmail;
           $this->password = $password;
           $this->role = $role;
       }
    // public static function login($pdo,$Email,$MatKhau)
    // {

    //     if(empty($Email) || empty($MatKhau)){
    //         $alert = "User and Pass must be not empty";
    //         return $alert;
    //     }
    //     else {
    //         $sql = "SELECT IDNguoiDung,nguoidung.IDChucVu as iddn,HoTen,Email,MatKhau FROM nguoidung,chucvu WHERE nguoidung.IDChucVu = chucvu.IDChucVu and Email=:Email and MatKhau=:MatKhau ";
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->bindParam(':Email',$Email,PDO::PARAM_STR);
    //         $stmt->bindParam(':MatKhau',$MatKhau,PDO::PARAM_STR);
    //         $stmt->execute();
    //         $user = $stmt->fetch();
    //         if ($stmt==true) {
    //         $role = $user['iddn'];
    //         $HoTen = $user['HoTen'];
    //         $IDNguoiDung = $user['IDNguoiDung'];
    //             if($role == 5)   {
    //                 $_SESSION['login_admin'] =$HoTen;
    //                 $_SESSION['admin'] = $HoTen;
    //                 header('location: admin/index.php');
    //             }
    //             elseif($role == 1||$role ==2||$role ==3)   {
    //                 $_SESSION['login_quanly'] =$HoTen;
    //                 $_SESSION['quanly'] = $HoTen;
    //                 $_SESSION['quanly_id'] = $IDNguoiDung;
    //                 header('location: quanly/index.php');
    //             }
    //             elseif($role ==4){
    //                 $_SESSION['login_detail'] =$HoTen;
    //                 $_SESSION['name'] = $HoTen;
    //                 $_SESSION['gianvien_id'] = $IDNguoiDung;
    //                 header('location: hethong.php');
    //             }
    //             else{
    //                 return ' bạn nhập sai rồi';
    //             }                          
    //         }
    //         exit();  
    //     }         
    // }
    public static function login($pdo, $Email, $MatKhau)
{
    if (empty($Email) || empty($MatKhau)) {
        $alert = "User and Pass must not be empty";
        return $alert;
    } else {
        $sql = "SELECT nguoidung.IDNguoiDung, nguoidung.IDChucVu as iddn, HoTen, Email, MatKhau,phanquyen.IDPhanQuyen as idpq FROM nguoidung, chucvu,phanquyen,quyen 
        WHERE nguoidung.IDChucVu = chucvu.IDChucVu
        and phanquyen.IDChucVu = nguoidung.IDChucVu
         and phanquyen.IDPhanQuyen = quyen.IDPhanQuyen
         and Email=:Email and MatKhau=:MatKhau ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
        $stmt->bindParam(':MatKhau', $MatKhau, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($stmt == true) {
            if ($user) {
                $role = $user['iddn'];
                $HoTen = $user['HoTen'];
                $IDNguoiDung = $user['IDNguoiDung'];
                $quyen = $user['idpq'];
                if ($quyen == 1) {
                    $_SESSION['login_admin'] = $HoTen;
                    $_SESSION['admin'] = $HoTen;
                    header('location: admin/index.php');
                }elseif ($quyen == 2) {
                    $_SESSION['login_quanly'] = $HoTen;
                    $_SESSION['quanly'] = $HoTen;
                    $_SESSION['quanly_id'] = $IDNguoiDung;
                    header('location: quanly/index.php');
                } else {
                    $_SESSION['login_detail'] = $HoTen;
                    $_SESSION['name'] = $HoTen;
                    $_SESSION['gianvien_id'] = $IDNguoiDung;
                    header('location: hethong.php');
                }
            } else {
                return 'Tài khoản hoặc mật khẩu không đúng';
            }
        }
        exit();
    }
}  
    public static  function logout(){
        if(isset($_SESSION['login_detail'])){
            unset($_SESSION['login_detail']);
            header('location: index.php');
        }
        if(isset($_SESSION['login_admin'])){
            session_destroy();
            unset($_SESSION['login_admin']);
            header('location: index.php');
        }
        if(isset($_SESSION['login_quanly'])){
            session_destroy();
            unset($_SESSION['login_quanly']);
            header('location: index.php');
        }
    }
      public static function getUser($pdo, $limit, $offset)
    {
        $sql = "SELECT * FROM taikhoan LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    
    public static function countAll($pdo)
    {
        $sql = "SELECT COUNT(*) as total FROM taikhoan";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $result['total'];
            return $data;
        }
    }
    public static function getOneByID($pdo, $TenTK) {
        $sql = "SELECT *  FROM taikhoan WHERE TenTK = :TenTK";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':TenTK',$TenTK,PDO::PARAM_STR);
        if ($stmt->execute()) {
            $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function getOneByID3($pdo,$Masp)
    {
        // $sql = "SELECT product.*, brand.BrandName FROM product INNER JOIN brand ON product.BrandID = brand.BrandID WHERE product.ProductID = :ProductID";
        $sql = "SELECT * FROM taikhoan WHERE TenTK=:TenTK";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':TenTK',$Masp, PDO::PARAM_STR);

        if ($stmt->execute()) {

            $product= $stmt->fetch(PDO::FETCH_ASSOC);
            $data = $product;
            return $data;
        }
    }
    public static function delete($pdo, $ID)
    {
        $sql = "DELETE FROM taikhoan WHERE TenTK=:TenTK";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':TenTK',$ID, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        }
    }

    public static function requireLogin(){
        if(!isset($_SESSION['login_detail'])){
            return ' bạn cần đăng nhặp bình luận';
        }
        else{
        return ' bạn cần đăng nhặp bình luận';
        }
    }
    public static  function register(){
        if(isset($_SESSION['login_detail'])){
            unset($_SESSION['login_detail']);
            header('location: index.php');
        }
    }
    public static function registerAccount($pdo,$AccountName,$password,$username,$Phone,$address,$userEmail,$role)
    {
         ///Hàm hash mã password
    
    ///Hảm tạo tài khoản
    $sql = "INSERT INTO taikhoan(TenTK,MK,TenKH,SDT,DiaChi,Email,Role) VALUES (:TenTk,:MK,:TenKH,:SDT,:DiaChi,:Email,:Role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':TenTk',$AccountName,PDO::PARAM_STR);
    $stmt->bindParam(':MK',$password,PDO::PARAM_STR);
    $stmt->bindParam(':TenKH',$username,PDO::PARAM_STR);
    $stmt->bindParam(':SDT',$Phone,PDO::PARAM_STR);
    $stmt->bindParam(':DiaChi',$address,PDO::PARAM_STR);
    $stmt->bindParam(':Email',$userEmail,PDO::PARAM_STR);
    $stmt->bindValue(':Role',$role,PDO::PARAM_INT); 
    if ($stmt->execute()) {       
        return true;
        } 
    }
    public static function edit($pdo,$AccountName,$password,$username,$Phone,$address,$userEmail,$role)
    {
        $sql = "UPDATE taikhoan SET MK=:MK,TenKH=:TenKH,SDT=:SDT,DiaChi=:DiaChi,Email=:Email,Role=:Role WHERE TenTK=:TenTK";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':TenTk',$AccountName,PDO::PARAM_STR);
        $stmt->bindParam(':MK',$password,PDO::PARAM_STR);
        $stmt->bindParam(':TenKH',$username,PDO::PARAM_STR);
        $stmt->bindParam(':SDT',$Phone,PDO::PARAM_STR);
        $stmt->bindParam(':DiaChi',$address,PDO::PARAM_STR);
        $stmt->bindParam(':Email',$userEmail,PDO::PARAM_STR);
        $stmt->bindValue(':Role',$role,PDO::PARAM_INT); 
        if ($stmt->execute()) {
            return true;
        }
    }
    public static function edit2($pdo,$AccountName,$password,$username,$Phone,$address,$userEmail,$role)
    {
        $sql = "UPDATE taikhoan SET MK=:MK,TenKH=:TenKH,SDT=:SDT,DiaChi=:DiaChi,Email=:Email,Role=:Role WHERE TenTK=:TenTK";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':TenTk',$AccountName,PDO::PARAM_STR);
        $stmt->bindParam(':MK',$password,PDO::PARAM_STR);
        $stmt->bindParam(':TenKH',$username,PDO::PARAM_STR);
        $stmt->bindParam(':SDT',$Phone,PDO::PARAM_STR);
        $stmt->bindParam(':DiaChi',$address,PDO::PARAM_STR);
        $stmt->bindParam(':Email',$userEmail,PDO::PARAM_STR);
        $stmt->bindValue(':Role',$role,PDO::PARAM_INT); 
        $stmt->execute();
        if ($stmt==true) {
            return true;
        }
    }


    // public function UpdateUser(User $user) {
    //     $sql = "UPDATE user SET Name = ? ,Email = ?,Password = ?, Image = ? ,Phone= ?,Address= ? WHERE Id = ?";
    //     include_once 'Connection.php';
    //     $db = new Connection();
    //     $pdo = $db->getConnect();
    //     $stmt = $pdo->prepare($sql); 
    //     if($stmt->execute([$user->Name,$user->Email,$user->Password,$user->Image,$user->Phone,$user->Address,$user->Id])){
    //         return true;
    //     }         
    //     else {
    //         return false;
    //     }
        
    // }



    
}