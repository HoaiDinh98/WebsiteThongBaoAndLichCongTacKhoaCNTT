<?php
	$filepath = realpath(dirname(__FILE__));
	require '../classes/Database.php';
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class Phongban
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Phongban($TenPhongBan,$GhiChu){

			$catName = $this->fm->validation($TenPhongBan);
			$catName = mysqli_real_escape_string($this->db->link, $TenPhongBan);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			
			if(empty($catName)){
				$alert = "<span class='error'>Tên phòng ban không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM phongban WHERE TenPhongBan='$TenPhongBan' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Phòng ban đã tồn tại</span>";
					return $alert;
				}else
					{
					$query = "INSERT INTO phongban(TenPhongBan,GhiChu) VALUES('$TenPhongBan','$GhiChu')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm phòng ban thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không thể thêm</span>";
						return $alert;
					}
				}
		}

		}
		public function show_Phongban(){
			$query = "SELECT * FROM phongban order by IDPhongBan desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_Phongban($catName,$id,$GhiChu){

			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$GhiChu = mysqli_real_escape_string($this->db->link, $GhiChu);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Tên phòng ban không thể để trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM phongban WHERE TenPhongBan ='$catName' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Phòng ban đã tồn tại</span>";
					return $alert;
				}
				$query = "UPDATE phongban SET TenPhongBan = '$catName' , GhiChu = '$GhiChu' WHERE IDPhongBan = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thay đổi thông tin phòng ban thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không thể thay đổi</span>";
					return $alert;
				}
			}

		}
		public function del_Phongban($id){
			$query = "DELETE FROM phongban where IDPhongBan = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Đã xóa phòng ban</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không thể xóa</span>";
				return $alert;
			}
			
		}
		public function getPhongbanbyId($id){
			$query = "SELECT * FROM phongban where IDPhongBan = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		


	}
?>