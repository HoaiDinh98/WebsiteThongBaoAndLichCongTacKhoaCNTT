<?php
	$filepath = realpath(dirname(__FILE__));
	include_once '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Themnhom
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//them nhom
		public function insert_NhomGV_GV($IDMaNhom,$IDNguoiDung){

			$catName = $this->fm->validation($IDMaNhom);
			$catName = mysqli_real_escape_string($this->db->link, $IDMaNhom);
			$GhiChu = mysqli_real_escape_string($this->db->link, $IDNguoiDung);
			
			if(empty($catName)){
				$alert = "<span class='error'>Vui lòng chọn Tên giảng viên và Tên nhóm</span>";
				return $alert;
			}else{
				// $check_email = "SELECT * FROM chitietdanhsachgvnhan WHERE IDNguoiDung = '$IDNguoiDung' LIMIT 1";
				// $result_check = $this->db->select($check_email);
				// // if($result_check){
				// // 	$alert = "<span class='error'>Giản viên này đang thuộc nhóm khác</span>";
				// // 	return $alert;
				// // }else
				// 	{
					$query = "INSERT INTO chitietdanhsachgvnhan(IDNhomGV,IDNguoiDung) VALUES('$IDMaNhom','$IDNguoiDung')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm giảng viên vào nhóm thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
				
		}
		}
        public function show_Congdoan(){
			$query = "

			SELECT chitietdanhsachgvnhan.*, danhsachgvnhan.TenNhom, nguoidung.HoTen,chitietdanhsachgvnhan.IDNhomGV AS idngv,chitietdanhsachgvnhan.IDNguoiDung AS idnd  

			FROM chitietdanhsachgvnhan 

			INNER JOIN danhsachgvnhan ON chitietdanhsachgvnhan.IDNhomGV = danhsachgvnhan.IDNhomGV

			INNER JOIN nguoidung ON chitietdanhsachgvnhan.IDNguoiDung = nguoidung.IDNguoiDung 

			order by chitietdanhsachgvnhan.IDNhomGV desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function show_Nhomgianvien(){
			$query = "SELECT * FROM danhsachgvnhan order by IDNhomGV desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function show_GV(){
			$query = "SELECT * FROM nguoidung where IDChucVu!=5  order by IDNguoiDung desc";
			$result = $this->db->select($query);
			return $result;
		}

        public function update_Congdoan($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên giảng viêng và tên nhóm không được để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM chitietdanhsachgvnhan WHERE IDNguoiDung ='$GhiChu' LIMIT 1";
				$result_check = $this->db->select($check_email);
				// if($result_check){
				// 	$alert = "<span class='error'>Giản viên đã thuộc nhóm này</span>";
				// 	return $alert;
				// }
				$query = "UPDATE chitietdanhsachgvnhan SET IDNhomGV = '$catName' , IDNguoiDung = '$GhiChu' WHERE IDNguoiDung = '$GhiChu'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi nhóm của giản viên thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Congdoan($id){
			$query = "DELETE FROM chitietdanhsachgvnhan where IDNguoiDung = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa giảng viên ra khỏi nhóm thành công </span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function del_Congdoan2($id,$IDNhomGV){
			$query = "DELETE FROM chitietdanhsachgvnhan where IDNguoiDung = '$id' and IDNhomGV = '$IDNhomGV' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa giảng viên ra khỏi nhóm thành công $IDNhomGV</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
        public function getCongdoanbyId($id){
			$query = "SELECT * FROM chitietdanhsachgvnhan where IDNhomGV = '$id'";
			$result = $this->db->select($query);
			return $result;
		}


	}
?>