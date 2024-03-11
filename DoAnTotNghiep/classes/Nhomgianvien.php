<?php
	$filepath = realpath(dirname(__FILE__));
	include_once '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Nhomgianvien
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Nhomgianvien($TenNhom,$GhiChu){

			$catName = $this->fm->validation($TenNhom);
			$catName = mysqli_real_escape_string($this->db->link, $TenNhom);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			
			if(empty($catName)){
				$alert = "<span class='error'>Tên nhóm giản viên không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM danhsachgvnhan WHERE TenNhom='$TenNhom' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Nhóm giản viên đã tồn tại</span>";
					return $alert;
				}else
					{
					$query = "INSERT INTO danhsachgvnhan(TenNhom,GhiChu) VALUES('$TenNhom','$GhiChu')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm nhóm giản viên thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
				}
		}

		}
		public function show_Nhomgianvien(){
			$query = "SELECT * FROM danhsachgvnhan order by IDNhomGV desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_Nhomgianvien($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên nhóm giản viên không thể để trống</span>";
				return $alert;
			}else{
				// $check_email = "SELECT * FROM danhsachgvnhan WHERE TenNhom='$catName' LIMIT 1";
				// $result_check = $this->db->select($check_email);
				// if($result_check){
				// 	$alert = "<span class='error'>Nhóm giản viên đã tồn tại</span>";
				// 	return $alert;
				// }
				$query = "UPDATE danhsachgvnhan SET TenNhom = '$catName' , GhiChu = '$GhiChu' WHERE IDNhomGV = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi nhóm giản viên thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Nhomgianvien($id){
			$query = "DELETE FROM danhsachgvnhan where IDNhomGV = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function getNhomgianvienbyId($id){
			$query = "SELECT * FROM danhsachgvnhan where IDNhomGV = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Nhomgianvien_fontend(){
			$query = "SELECT * FROM chucvu order by IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id){
			$query = "SELECT * FROM chucvu WHERE IDChucVu='$id' order by IDChucVu desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT nguoidung.*,chucvu.TenChucVu,chucvu.IDChucVu FROM nguoidung,chucvu WHERE nguoidung.IDChucVu=chucvu.IDChucVu AND nguoidung.IDChucVu ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		


	}
?>