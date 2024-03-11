<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Chucvu
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Chucvu($TenChucVu,$GhiChu){

			$catName = $this->fm->validation($TenChucVu);
			$catName = mysqli_real_escape_string($this->db->link, $TenChucVu);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			
			if(empty($catName)){
				$alert = "<span class='error'>Tên chức vụ không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM chucvu WHERE TenChucVu='$TenChucVu' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Chức vụ đã tồn tại</span>";
					return $alert;
				}else
					{
					$query = "INSERT INTO chucvu(TenChucVu,GhiChu) VALUES('$TenChucVu','$GhiChu')";
					$result = $this->db->insert($query);
					$lastInsertedID = mysqli_insert_id($this->db->link);
					$query2 = "INSERT INTO phanquyen(IDPhanQuyen,IDChucVu) VALUES(3,'$lastInsertedID')";
					$result2 = $this->db->insert($query2);
					if($result){
						$alert = "<span class='success'>Thêm chức vụ thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
				}
		}

		}
		public function show_Chucvu(){
			$query = "SELECT * FROM chucvu where IDChucVu !=5 order by IDChucVu desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_Chucvu($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên chức vụ không thể để trống</span>";
				return $alert;
			}else{
				//  
				$query = "UPDATE chucvu SET TenChucVu = '$catName' , GhiChu = '$GhiChu' WHERE IDChucVu = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi chức vụ thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Chucvu($id){
			$query = "DELETE FROM chucvu where IDChucVu = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function getChucvubyId($id){
			$query = "SELECT * FROM chucvu where IDChucVu = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_Chucvu_fontend(){
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