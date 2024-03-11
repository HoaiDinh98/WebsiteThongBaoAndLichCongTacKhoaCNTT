<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Monhoc
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Monhoc($TenBoMon){

			$brandName = $this->fm->validation($TenBoMon);
			$brandName = mysqli_real_escape_string($this->db->link, $TenBoMon);
			if(empty($TenBoMon)){
				$alert = "<span class='error'>Tên môn học không thể để trống</span>";
				return $alert;
			}
			else{
				$check_email = "SELECT * FROM bomon WHERE TenBoMon='$TenBoMon' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Tên môn học đã tồn tại</span>";
					return $alert;
				}else
				{
					$query = "INSERT INTO bomon(TenBoMon) VALUES('$TenBoMon')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm môn học thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không thê thêm môn học</span>";
						return $alert;
					}
			}
			}
		}
		public function show_Monhoc(){
			$query = "SELECT * FROM bomon order by IDBoMon desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function getMonhocbyId($id){
			$query = "SELECT * FROM bomon where IDBoMon = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_Monhoc($TenBoMon,$id){

			$brandName = $this->fm->validation($TenBoMon);
			$brandName = mysqli_real_escape_string($this->db->link, $TenBoMon);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($brandName)){
				$alert = "<span class='error'>Tên môn học không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM bomon WHERE TenBoMon='$TenBoMon' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Tên môn học đã tồn tại</span>";
					return $alert;
				}
				$query = "UPDATE bomon SET TenBoMon = '$TenBoMon' WHERE IDBoMon = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi tên môn học thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Monhoc($id){
			$query = "DELETE FROM bomon where IDBoMon = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa môn học thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		
		public function show_Monhoc_fontend(){
			$query = "SELECT * FROM bomon order by IDBoMon desc";
			$result = $this->db->select($query);
			return $result;
		}

	}
?>