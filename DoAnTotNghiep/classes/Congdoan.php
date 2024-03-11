<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Congdoan
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Congdoan($TenCongDoan,$GhiChu){

			$catName = $this->fm->validation($TenCongDoan);
			$catName = mysqli_real_escape_string($this->db->link, $TenCongDoan);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			
			
			if(empty($catName)){
				$alert = "<span class='error'>Tên công đoàn không được để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM congdoan WHERE TenCongDoan='$TenCongDoan' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Công đoàn đã tồn tại</span>";
					return $alert;
				}else
					{
					$query = "INSERT INTO congdoan(TenCongDoan,GhiChu) VALUES('$TenCongDoan','$GhiChu')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm công đoàn thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không thể thêm công đoàn</span>";
						return $alert;
					}
				}
		}

		}
		public function show_Congdoan(){
			$query = "SELECT * FROM congdoan where IDCongDoan != 9 order by IDCongDoan desc";
			$result = $this->db->select($query);
			return $result;
		}
		///
		public function show_Doanvien(){
			$query = "

			SELECT nguoidung.*,congdoan.TenCongDoan

			FROM nguoidung 

			INNER JOIN congdoan ON nguoidung.IDCongDoan = congdoan.IDCongDoan 

			Where nguoidung.IDChucVu !=5 and nguoidung.IDCongDoan !=9

			order by nguoidung.IDNguoiDung desc"
			;

			// $query = "SELECT * FROM tbl_product order by productId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function update_Congdoan($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên công đoàn không được để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM congdoan WHERE TenCongDoan='$catName' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Công đoàn đã tồn tại</span>";
					return $alert;
				}
				$query = "UPDATE congdoan SET TenCongDoan = '$catName' , GhiChu = '$GhiChu' WHERE IDCongDoan = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi công đoàn thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Congdoan($id){
			$query = "DELETE FROM congdoan where IDCongDoan = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa công đoàn thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function getCongdoanbyId($id){
			$query = "SELECT * FROM congdoan where IDCongDoan = '$id'";
			$result = $this->db->select($query);
			return $result;
		}


	}
?>