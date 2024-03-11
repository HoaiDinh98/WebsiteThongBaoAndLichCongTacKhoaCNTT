<?php
	$filepath = realpath(dirname(__FILE__));
	include_once '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Phanquyen
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//them nhom
		public function insert_Phanquyen_GV($IDPhanQuyen,$IDNguoiDung){

			$catName = $this->fm->validation($IDPhanQuyen);
			$catName = mysqli_real_escape_string($this->db->link, $IDPhanQuyen);
			$GhiChu = mysqli_real_escape_string($this->db->link, $IDNguoiDung);
			
			if(empty($catName)){
				$alert = "<span class='error'>Vui lòng chọn Tên giảng viên và Tên quyền</span>";
				return $alert;
			}else{
				// $check_email = "SELECT * FROM chitietdanhsachgvnhan WHERE IDNguoiDung = '$IDNguoiDung' LIMIT 1";
				// $result_check = $this->db->select($check_email);
				// // if($result_check){
				// // 	$alert = "<span class='error'>Giản viên này đang thuộc nhóm khác</span>";
				// // 	return $alert;
				// // }else
				// 	{
					$query = "INSERT INTO phanquyen(IDPhanQuyen,IDNguoiDung) VALUES('$IDPhanQuyen','$IDNguoiDung')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Phân quyền giảng viên thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Phân quyền thất bại</span>";
						return $alert;
					}
				
		}
		}
        public function createPhanQuyen($pdo,$IDPhanQuyen,$IDNguoiDung)
        {
            
            $sql = "INSERT INTO phanquyen(IDPhanQuyen,IDNguoiDung)
             VALUES (:IDPhanQuyen,:IDNguoiDung)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':IDPhanQuyen', $IDPhanQuyen, PDO::PARAM_INT);
            $stmt->bindValue(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
                $data = $product;
                return $data;
            }
            
        }
        public function show_Congdoan(){
			$query = "

			SELECT nguoidung.IDNguoiDung, nguoidung.IDChucVu as iddn,HoTen, Email, MatKhau,phanquyen.IDPhanQuyen as idpq,quyen.* FROM nguoidung, chucvu,phanquyen,quyen 
        WHERE nguoidung.IDChucVu = chucvu.IDChucVu
        and phanquyen.IDChucVu = nguoidung.IDChucVu
         and phanquyen.IDPhanQuyen = quyen.IDPhanQuyen
         and nguoidung.IDChucVu !=5
         order by nguoidung.IDNguoiDung desc";

			$result = $this->db->select($query);
			return $result;
		}
        public function show_Chucvu(){
			$query = "SELECT * FROM chucvu,phanquyen,quyen 
            WHERE chucvu.IDChucVu = phanquyen.IDChucVu
            and quyen.IDPhanQuyen = phanquyen.IDPhanQuyen
            and chucvu.IDChucVu !=5
             order by chucvu.IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function show_Chucvu2(){
			$query = "SELECT * FROM chucvu where IDChucVu !=5 order by IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function show_GV(){
			$query = "SELECT * FROM nguoidung where IDChucVu!=5  order by IDNguoiDung desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function show_Quyen(){
			$query = "SELECT * FROM quyen WHERE IDPhanQuyen!=1  order by IDPhanQuyen desc";
			$result = $this->db->select($query);
			return $result;
        }

        public function update_Congdoan($id,$IDPhanQuyen){

			$IDPhanQuyen = mysqli_real_escape_string($this->db->link, $IDPhanQuyen);
			$id = mysqli_real_escape_string($this->db->link, $id);


				$query = "UPDATE phanquyen SET IDPhanQuyen = '$IDPhanQuyen' WHERE IDChucVu = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi nhóm của giản viên thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			

		}
        public function update($pdo,$IDChucVu,$IDPhanQuyen)
        {
            
                    $sql = "UPDATE phanquyen SET IDPhanQuyen = :IDPhanQuyen WHERE IDChucVu = :IDChucVu";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':IDChucVu', $IDChucVu, PDO::PARAM_INT);
            $stmt->bindValue(':IDPhanQuyen', $IDPhanQuyen, PDO::PARAM_INT);
            $success = $stmt->execute();
            if ($success) {
                return true;
            }
            
        }
        public function getCongdoanbyId($id){
			$query = "SELECT * FROM phanquyen,quyen,chucvu 
            where phanquyen.IDChucVu = chucvu.IDChucVu 
            and phanquyen.IDPhanQuyen = quyen.IDPhanQuyen 
            and phanquyen.IDChucVu =  '$id'";
			$result = $this->db->select($query);
			return $result;
		}


	}
?>